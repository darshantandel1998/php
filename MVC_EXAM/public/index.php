<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

Core\App::run();

$router = new Core\Router();

$router->add('admin/{controller}', ['action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$router->add('user/{controller}', ['action' => 'index', 'namespace' => 'User']);
$router->add('user/{controller}/{action}', ['namespace' => 'User']);
$router->add('user/{controller}/{action}/{id:\d+}', ['namespace' => 'User']);

$router->add('', ['controller' => 'Home', 'action' => 'login']);
$router->add('{action}', ['controller' => 'Home']);

$router->dispatch($_SERVER['QUERY_STRING']);
