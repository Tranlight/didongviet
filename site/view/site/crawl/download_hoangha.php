<?php
$this->loadLibrary('simple_html_dom');
$this->loadHelper('URL');
// $var = array();

// for ($i=1; $i <=20 ; $i++) {
	$html = file_get_html('https://hoanghamobile.com/kho-phu-kien-c17.html?sort=0&p=1');
	$ls = $html->find('.mosaic-block a');
	foreach ($ls as $key => $value) {
		$p = getProduct(file_get_html('https://hoanghamobile.com'.$value->attr['href']));
		echo $p->name.'<br>';
		addProduct(getProduct(file_get_html('https://hoanghamobile.com'.$value->attr['href'])));
	}
// }

// $arr_json = json_encode($var, JSON_PRETTY_PRINT);

// $file = @fopen('../assert/data_hoangha_accessories.json', 'w');

// if(fwrite($file, $arr_json))
// 	echo "đã ghi file ";
// else
// 	echo "Chưa ghi được";
function addProduct($p) {
	$db = new Model\Database();
	echo mysqli_character_set_name($db->connect()).'  : ';
	$db->insert('product', array('name', 'price_sale', 'price_original', 'alias', 'url_images'), array($p->name, $p->price[0], isset($p->price[1])?$p->price[1]:0, to_slug($p->name), implode('|', $p->img)));
}
function getProduct($page) {
	$product = new stdClass;
	$product->name = $page->find('.product-details h1 strong', 0)->nodes[0]->_[4];
	$image = $page->find('img[u="image"]');
	
	foreach ($image as $key => $value) {
		$product->img[] = $value->attr['src'];
		// copy($returnValue, '../image/'.basename($returnValue));
		// $a = getimagesize($returnValue);
		// $product->image_size = [$a[0],$a[1]];
		// $product->image_url = '/image/'.basename($returnValue);
	}
	$d = $page->find('.simple-prop label, .simple-prop span a');
	for ($i=0; $i < count($d); $i+=2) { 
		if(isset($d[$i+1]))
			$product->prop[str_replace(':','',$d[$i]->nodes[0]->_[4])] = $d[$i+1]->nodes[0]->_[4];
		else
			$product->prop[str_replace(':','',$d[$i]->nodes[0]->_[4])] = '';
	}
	$price = $page->find('.product-price p span');
	if(count($price) == 2) {
		$product->price[] = $price[0]->children[0]->nodes[0]->_[4];
		$product->price[] = $price[1]->nodes[0]->_[4];
	} else
	$product->price[] = $price[0]->nodes[0]->_[4];
	return $product;
}
?>