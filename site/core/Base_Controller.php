<?php
namespace Core;

if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->loadHelper('URL');
        $this->load_header();
    }
    public function load_header()
    {
        try {
            $ls = Session::read('cart_item') ? Session::read('cart_item') : array();
        } catch (ExpiredSessionException $e) {
            Session::write('cart_item', array());
        }
        $this->loadView('site/include/header', array('num_products' => count($ls)));
    }
    public function load_footer()
    {
        $this->loadView('site/include/footer');
    }
    public function __destruct() 
    {
        $this->load_footer();
    }
}
?>