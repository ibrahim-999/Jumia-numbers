<?php

$router->get('/', "HomeController@index");
$router->get('/api/customers/', "CustomersController@index");
