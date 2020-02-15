<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

Core\App::run();

$router = new Core\Router();

$router->add('{url:[a-z-]*}', ['controller' => 'CMS', 'action' => 'view']);

$router->add('admin/cms/{controller}', ['action' => 'index', 'namespace' => 'Admin\CMS']);
$router->add('admin/cms/{controller}/{action}', ['namespace' => 'Admin\CMS']);
$router->add('admin/cms/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin\CMS']);

$router->add('admin/{controller}', ['action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$router->add('{controller}/{action}/{url:[a-z-]*}');

$router->dispatch($_SERVER['QUERY_STRING']);

// $router->add('admin/login{action}', ['controller' => 'Home', 'namespace' => 'Admin']);

// $router->add('{controller}', ['action' => 'index']);
// $router->add('{controller}/{action}');
// $router->add('{controller}/{action}/{id:\d+}');
