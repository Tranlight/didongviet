<?php
namespace Controller;
use Core\Controller;
use Core\Session;
class RequestController extends Controller {

	public function addToCart($product_id, $num) {
		$data = array(
			'status' => '',
		);

		if(!is_numeric($product_id)) {
			$data['status'] = '400';
			echo json_encode($data);
			die;
		}
		
		$ls_products = Session::read('cart_item') ? Session::read('cart_item') : array();
		if(in_array("$product_id", array_keys($ls_products))) {
			$ls_products["$product_id"]  = intval($num) ? intval($num) : 1;
		} else {
			$ls_products["$product_id"]  = 1;
		}
		
		$data['status'] = '200';
		Session::write('cart_item', $ls_products);
		echo json_encode($data);
		die;
	}
}