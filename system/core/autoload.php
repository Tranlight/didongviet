<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

// Load Base Controller Class
include_once PATH_SYSTEM . '/core/Controller.php';
// if (file_exists(PATH_APPLICATION . '/core/Base_Controller.php')){
//     require_once PATH_APPLICATION . '/core/Base_Controller.php';
// }

// Auto Load undeclared classes
function my_app_autoloader($class)
{
    $namespace = '';
    if (($strpos = strpos($class, '\\')) !== false) {
        $namespace = substr($class, 0, $strpos);
        $class = substr($class, $strpos+1);
    }
    $prefix = ucfirst($namespace).'\\';
    // Replace '\' to '/'
    $classWithoutPrefix = preg_replace('/^' . preg_quote($prefix) . '/', '', $class);
    $file = DIRECTORY_SEPARATOR.strtolower($namespace).'/'.str_replace('\\', DIRECTORY_SEPARATOR, $classWithoutPrefix) . '.php';

    if (file_exists(PATH_SYSTEM.$file)) {
        require_once PATH_SYSTEM.$file;
    } else if(file_exists(PATH_APPLICATION.$file)) {
        require_once PATH_APPLICATION.$file;
    }
}
spl_autoload_register('my_app_autoloader');

// Create route class
require_once PATH_SYSTEM.'/router/functions.php';
$dispatcher = Router\simpleDispatcher(function(Router\RouteCollector $r) {
    require_once PATH_SYSTEM.'/router/Web.php';
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatcher alll Route
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    // if not found Route
    case Router\Dispatcher::NOT_FOUND:
        $controller = new Core\Base_Controller();
        $controller->loadView('error/404');
    break;
    // if not Allowed Method
    case Router\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        header("HTTP/1.0 405 Method Not Allowed");
    break;
    // Found method and route
    case Router\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $last = explode('/', $handler);
        $last = end($last);
        $segments = explode('@', $last);
        $controller = $segments[0];
        $method = $segments[1];
        $controller = new $controller();
        call_user_func_array(array($controller, $method), $vars ? $vars : array());
    break;
}