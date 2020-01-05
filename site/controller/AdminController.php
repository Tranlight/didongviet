<?php
namespace Controller;
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
use Model\Database;
/**
 * 
 */
class AdminController extends FT_Controller
{
	
	public function Index() {
		$this->loadView('admin/');
	}
}