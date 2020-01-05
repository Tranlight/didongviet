<?php
$r->get('/rawl', 'Controller\IndexController@Rawl');
$r->get('/connection', 'Controller\IndexController@Connection');
$r->get('/', 'Controller\IndexController@Index');
$r->get('/product/{title}', 'Controller\IndexController@connection');
$r->get('/adddatabase', 'Controller\IndexController@Convert_Json');
$r->addGroup('/admin', function (Router\RouteCollector $r) {
	$r->get('/', 'Controller\IndexController@connection');
});
$r->get('/gio-hang', 'Controller\IndexController@ViewCart');