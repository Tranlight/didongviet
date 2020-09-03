<?php
namespace Controller;
use Core\Admin_Controller;
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
use Model\Product;
/**
 * 
 */
class AdminController extends Admin_Controller
{
	public function Index($page = null) {
		$this->load_header();
		$data = array();
		if(!$page) {
			$page = 'dashboard';
		}
		if(file_exists(PATH_APPLICATION . '/view/admin/template/'. $page . '.php')) {
			switch ($page) {
				case 'products':
					$mProduct = new Product();
					$data['pages']	  = ceil($mProduct->size() / 10);
					$data['products'] = $mProduct->getbyLimit(array('id', 'name', 'alias', 'url_images'), 0, 10);
					break;
			}
			$this->loadView('admin/template/'. $page, $data);
		} else {
			$this->loadView('error/404');
		}
	}
}