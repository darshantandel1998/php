<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

Core\App::run();

$router = new Core\Router();

$router->add('admin/login', ['controller' => 'Admin', 'action' => 'login']);
$router->add('admin/loginCheck', ['controller' => 'Admin', 'action' => 'loginCheck']);
$router->add('admin/logout', ['controller' => 'Admin', 'action' => 'logout']);

$router->add('{url:[a-z0-9-]*}', ['controller' => 'CMS', 'action' => 'view']);

$router->add('admin/cms/{controller}', ['action' => 'index', 'namespace' => 'Admin\CMS']);
$router->add('admin/cms/{controller}/{action}', ['namespace' => 'Admin\CMS']);
$router->add('admin/cms/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin\CMS']);

$router->add('admin/{controller}', ['action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$router->add('{controller}/{action}/{url:[a-z0-9-]*}');

$router->dispatch($_SERVER['QUERY_STRING']);
