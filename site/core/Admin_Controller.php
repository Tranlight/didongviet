<?php
namespace Core;
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Admin_Controller extends Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->loadHelper('URL');
    }
    public function load_header()
    {
        $this->loadView('admin/include/header');
    }
    public function load_footer()
    {
        $this->loadView('admin/include/footer');
    }
    public function __destruct() 
    {
        $this->load_footer();
    }
}
?>