<?php
$this->loadLibrary('simple_html_dom');


$html = file_get_html('https://www.thegioididong.com/dtdd');
// $ls_product = array();
echo $html;
echo '<h1>Load xong roi</h1>';
// foreach ($ls_product as $index => $value) {
// 	$ls_product[$index] = $value->parent;
// }
// $ls_product = getProduct($ls_product);

// $arr_json = json_encode($ls_product, JSON_PRETTY_PRINT);
// $file = @fopen(asset('/assert',true).'/data-dienthoai-tgdd.json', 'w');

// if(fwrite($file, $arr_json))
// 	echo "đã ghi file ";
// else
// 	echo "Chưa ghi được";

function getProduct($noidung) {
	$arr_p = array();
	foreach ($noidung as $el) {
		$product = new stdClass;
		$image_original = isset($el->children[0]->attr['src'])?$el->children[0]->attr['src']:$el->children[0]->attr['data-original'];
		$image = preg_replace("/ /", "%20", $image_original);
		if(!copy($image, asset('/image/tgdd',true).'/'.basename($image_original)))
			continue;
		$a = getimagesize($image);
		if(!$a)
			continue;
		$product->image_size = [$a[0],$a[1]];
		$product->image_url = '/image/tgdd/'.basename($image_original);
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