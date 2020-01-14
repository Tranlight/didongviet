<?php
namespace Controller;
use Model\Product;
use Model\Category;
use Core\Session;
class IndexController extends Base_Controller {
	public function Index() {
		// load view banner for website
		$this->loadView('site/template/section-one');
		
		//Load dữ liệu từ database
		$db = new Category();
		$categories = $db->getCategoriesHasNotAlias();
		$data = array();
		$listColumn = array(
			'product.id as id',
			'product.name as name',
			'product.price_sale as price_sale',
			'product.price_original as price_original',
			'product.alias as alias',
			'product.url_images as url_images'
		);
		$joinList = array(array(
			'orientation' => 'INNER',
			'referenced_table'=>'product',
			'referenced_column'=>'id',
			'table_name'=>'product_category',
			'column_name'=>'product_id'
		));
		foreach ($categories as $category) {
			$where = array(array('column'=>'category_id', 'condition'=>'=', 'value'=>$category['id']));
			$products = $db->select('product_category', $listColumn, $where, $joinList);
			$data[$category['name']] = array($category['isslide'], $products);
		}
		
		// Đổ dữ liệu ra view
		foreach ($data as $title => $arr) {
		$list_product = array('title' => $title, 'list_product'=>$arr[1]);
			if($arr[0])
				$this->loadView('site/template/product-list-slider',$list_product);
			else
				$this->loadView('site/template/product-list-row', $list_product);
		}
	}
	public function Rawl() {
		$this->loadView('site/download_hoangha');
	}

	public function loadDatafromJson() {
		// get data from file json
		$filename = asset('/assert/data.json', 1);
		$file = fopen($filename, 'r');
		if(!$file)
			die('Không mở được file');
		$txt = fread($file, filesize($filename));

		// return list product by category
		$data = json_decode($txt);
	}

	public function viewProduct($alias) {
		$db = new Product();
		$product = $db->getItembyAlias('/'.$alias);
		$db->disconnect();
		if(!empty($product))
			$this->loadView('site/template/product-detail', $product[0]);
		else
			$this->loadView('error/404');
	}

	public function Convert_Json() {
		$this->loadView('site/template/section-one');

		// get data from file json
		$filename = asset('/assert/data.json', 1);
		$file = fopen($filename, 'r');
		if(!$file)
			die('Không mở được file');
		$txt = fread($file, filesize($filename));

		// return list product by category
		$data = json_decode($txt);
		$db = new Product();
		foreach ($data as $title => $arr) {
			$isslide = ($arr[0] = 'div' ) ? 1 : 0;
			if($db->insert('category', array('name', 'isslide'), array($title, $isslide))) {
				$category_id = $db->connect()->insert_id;
				foreach ($arr[1] as $product) {
					$result = $db->insert('product', 
						array('name', 'price_sale', 'price_original', 'alias', 'url_images'),
						array($product->name, str_replace("\u20ab", "",str_replace(".", "",$product->sale_price)), str_replace("\u20ab", "", str_replace(".", "", $product->price)), '/'.to_slug($product->name), $product->image_url));
					if($result) {
						$product_id = $db->connect()->insert_id;
						$db->insert('product_category', array('product_id', 'category_id'), array($product_id, $category_id));
					}
				}
			}
		}
		$db->disconnect();
	}

	public function ViewCart() {
		$productdb = new Product();
		$ls_id 	   = Session::read('cart_item') ? Session::read('cart_item') : array();
		$ls		   = array();		
		$total     = 0;
		foreach ($ls_id as $id => $num_of_product) {
			$item  			= $productdb->getItembyId($id, array('name', 'price_sale', 'price_original', 'alias', 'url_images'))[0];
			$item['num']    = $num_of_product;
			$item['id']		= $id;
			$ls[] 			= $item;
			$total	+= (floatval($item['price_sale'])?floatval($item['price_sale']):floatval($item['price_original']))*$num_of_product;
		}
		$this->loadView('site/template/shopcart', array('total' => $total,'list_products' => $ls));
		// $productdb->disconnect();
	}
}