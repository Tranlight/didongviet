<?php
// PAGE
$r->get('/rawl', 'Controller\IndexController@Rawl');
$r->get('/connection', 'Controller\IndexController@Connection');
$r->get('/', 'Controller\IndexController@Index');
$r->get('/adddatabase', 'Controller\IndexController@Convert_Json');
$r->get('/cart', 'Controller\IndexController@ViewCart');
$r->get('/abc', 'Controller\IndexController@getInfo');
$r->get('/product/{id}', 'Controller\IndexController@viewProduct');
// REQUEST AJAX
$r->post('/add-to-cart/{product_id}/{num}', 'Controller\RequestController@addToCart');
$r->get('/admin[/]', 'Controller\AdminController@Index');
// ADMIN
$r->get('/admin/{page}', 'Controller\AdminController@Index');
