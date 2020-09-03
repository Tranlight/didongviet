<?php
namespace Controller;
use Core\Controller;
use Core\Session;
use Model\Product;
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

	public function product_page($current_page) {
		$product = new Product();
		$total_records = $product->size();

		$data = array(
			'status' => 401,
		);

		$limit = 10;
		 
		// TÍNH TOÁN TOTAL_PAGE VÀ START
		// tổng số trang
		$total_page = ceil($total_records / $limit);

		// Giới hạn current_page trong khoảng 1 đến total_page
		if ($current_page > $total_page || $current_page < 1){
			$data['last_page'] = $total_page;
		    header("Content-type: application/json");
	    	echo json_encode($data);
	    	exit();
		}
		// Tìm Start
		$start = ($current_page - 1) * $limit;
		 
		// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
		// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức

		$data['status'] 	= 200;
		$data['last_page']	= $total_page;
		$ls_products 	= $product->getbyLimit(null, $start, $limit);
		$html = '';
		$this->loadHelper('URL');
		foreach ($ls_products as $product) {
			extract($product);
			$html .= "<tr data-product=$id>
				<td>
					<input type=checkbox name=cbox>
				</td>
				<td>$id</td>
				<td>
					<img height=30px src=". asset(explode('|', $url_images)[0]).">
				</td>
				<td>
					<a href=\"/product$alias\">$name</a>
				</td>
				<td>
					<button title=\"Edit\" class=\"btn btn-warning\"><i class=\"fal fa-edit\"></i></button>
					<button title=\"Delete\" class=\"btn btn-danger\"><i class=\"fal fa-trash-alt\"></i></button>
				</td>
			</tr>";
		}
		$data['html'] = $html;
		header("Content-type: application/json");
	    echo json_encode($data);
	    exit();
	}
        
        public function getSensors() {
                
        }
        
        public function realtime() {
                $results = array();
                $lsName = array('Apple', 'Iphone', 'Ipad', 'Galaxy', 'LG', 'Oppo', 'Xiaomi','VSmart', 'Lenovo');
                $lsindex = array('5','3','7','16','2','4','9','12','10','11','11','11');
                for ($i=0; $i < rand(5,10); $i++) { 
                    $index = array_rand($lsindex, 1);
                    $name = array_rand($lsName, 1);
                    $results[] = array('Rate' => $lsindex[$index], 'Name' => $lsName[$name]);
                }
                echo json_encode($results);
        }


}