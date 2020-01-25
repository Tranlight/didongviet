<?php
$this->loadLibrary('simple_html_dom');

$html = file_get_html('https://www.thegioididong.com');
$cnt_1 = $html->find('.homeproduct, .homepromo');

// unset($cnt_1[0]);

foreach ($cnt_1 as $key => $value) {
	$x = $value->find('a>img');
	foreach ($x as $index => $vl) {
		$x[$index] = $vl->parent;
	}
	$title = ($value->tag == 'div')?$value->prev_sibling()->find('h2',0)->plaintext:$value->prev_sibling()->prev_sibling()->find('h2',0)->plaintext;
	$cnt_1[$title] = [$value->tag ,getProduct($x)];
	unset($cnt_1[$key]);
}

$arr_json = json_encode($cnt_1, JSON_PRETTY_PRINT);
$file = @fopen(asset('/assert',true).'/data.json', 'w');

if(fwrite($file, $arr_json))
	echo "đã ghi file ";
else
	echo "Chưa ghi được";

function getProduct($noidung) {
	$arr_p = array();
	foreach ($noidung as $el) {
		$product = new stdClass;
		$image_original = isset($el->children[0]->attr['src'])?$el->children[0]->attr['src']:$el->children[0]->attr['data-original'];
		$image = preg_replace("/ /", "%20", $image_original);
		if(!copy($image, asset('/image',true).'/'.basename($image_original)))
			continue;
		$a = getimagesize($image);
		if(!$a)
			continue;
		$product->image_size = [$a[0],$a[1]];
		$product->image_url = '/image/'.basename($image_original);
		if($el->children[1]->tag == 'h3') {
			$product->name = isset($el->children[1]->plaintext)?$el->children[1]->plaintext:'';
			$product->price = $el->children[2]->children[0]->plaintext;
			$product->sale_price = isset($el->children[2]->children[1])?$el->children[2]->children[1]->plaintext:'';
		}
		else {
			$product->name = isset($el->children[2]->nodes[0]->_[4])?$el->children[2]->plaintext:'';
			$product->price = $el->children[3]->children[0]->plaintext;
			$product->sale_price = isset($el->children[3]->children[1])?$el->children[3]->children[1]->plaintext:'';
		}

		$arr_p[] = $product;
	}	
	return $arr_p;
}
?>