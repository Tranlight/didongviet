<?php
namespace Controller;
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends FT_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->loadHelper('URL');
        $this->load_header();
    }
    public function load_header()
    {
        $this->loadView('site/include/header');
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