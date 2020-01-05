<?php

namespace Controller;
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

/**
 * @package     FT_Framework
 * @author      Tranlight
 * @email       tranlight98@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/FT_Controller.php
 */
class FT_Controller
{
    protected $library  = NULL;
    public function __construct() 
    {
        // Loader cho config
        // require_once PATH_SYSTEM . '/core/loader/FT_Config_Loader.php';
        // $this->config   = new FT_Config_Loader();
        // $this->config->load('config');
        // // Loader Library
        // require_once PATH_SYSTEM . '/core/loader/FT_Library_Loader.php';
        // $this->library = new FT_Library_Loader();
        // // Load Helper
        // require_once PATH_SYSTEM . '/core/loader/FT_Helper_Loader.php';
        // $this->helper = new FT_Helper_Loader();
        // // Load View
        // require_once PATH_SYSTEM . '/core/loader/FT_View_Loader.php';
        // $this->view = new FT_View_Loader();
    }

    public function loadConfig($config)
    {
        if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')){
            $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
            if ( !empty($config) ){
                foreach ($config as $key => $item){
                    $this->config[$key] = $item;
                }
            }
            return true;
        }
        return FALSE;
    }

    /**
     * Get item config
     * 
     * @param   string
     * @param   string
     * @desc    hàm get config item, tham số truyền vào là tên của item và tham số mặc định
     */
    public function get_item_config($key, $defailt_val = '')
    {
        return isset($this->config[$key]) ? $this->config[$key] : $defailt_val;
    }

    /**
     * Set item config
     * 
     * @param   string
     * @param   string
     * @desc    hàm set config item, tham số truyền vào là tên của item và giá trị của nó
     */
    public function set_item_config($key, $val){
        $this->config[$key] = $val;
    }

    public function loadHelper($helper)
    {
        $helper = ucfirst($helper) . '_Helper';
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }

    public function loadView($view, $data = array()) 
    {
        // Chuyển mảng dữ liệu thành từng biến
        extract($data);
        include PATH_APPLICATION . '/view/' . $view . '.php';
    }

    /**
     * Load library
     * 
     * @param   string
     * @param   array
     * @desc    hàm load library, tham số truyền vào là tên của library và 
     *          danh sách các biến trong hàm khởi tạo (nếu có)
     */
    public function loadLibrary($library, $agrs = array())
    {
        // Nếu thư viện chưa được load thì thực hiện load
        if ( empty($this->{$library}) )
        {
            // Chuyển chữ hoa đầu và thêm hậu tố _Library
            $class = ($library);
            require_once(PATH_SYSTEM . '/library/' . $class . '.php');
            $this->{$library} = new $class($agrs);
        }
    }

    public function __destruct() 
    {
        echo "đã hủy FT_Controller.php";
    }
}
?>