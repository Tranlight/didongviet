<?php
// Page
$r->get('/rawl', 'Controller\IndexController@Rawl');
$r->get('/connection', 'Controller\IndexController@Connection');
$r->get('/', 'Controller\IndexController@Index');
$r->get('/adddatabase', 'Controller\IndexController@Convert_Json');
$r->get('/cart', 'Controller\IndexController@ViewCart');
// $r->get('/{category-alias}', 'Controller\IndexController@ViewCart');
$r->get('/product/{id}', 'Controller\IndexController@viewProduct');
// Request Ajax
$r->post('/add-to-cart/{product_id}/{num}', 'Controller\RequestController@addToCart');
$r->addGroup('/admin', function (Router\RouteCollector $r) {
	$r->get('/', 'Controller\IndexController@connection');
});