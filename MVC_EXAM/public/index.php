<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

Core\App::run();

$router = new Core\Router();

$router->add('admin/{controller}', ['action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);

$router->add('{controller}', ['action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');

$router->dispatch($_SERVER['QUERY_STRING']);
