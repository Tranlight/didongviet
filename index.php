<?php

//Define basic Path
define('PATH_ROOT',  dirname(__FILE__));
define('PATH_SYSTEM',  dirname(__FILE__).'/system');
define('PATH_APPLICATION', dirname(__FILE__) .'/site');
//Get system config
require (PATH_SYSTEM . '/config/config.php');
// Declare and run autoload
include_once PATH_SYSTEM . '/core/autoload.php';