<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
use Dotenv\Dotenv;
use components\Config;
use components\Router;
use Zend\Diactoros\ServerRequestFactory;

// Подключаем переменные окружения
Dotenv::create('../')->load();
// @todo тоже на di
$config = Config::instance();

// Первичная настройка
ini_set('display_errors', $config->data['app']['debug']);
error_reporting($config->data['app']['debug_level']);

$request = ServerRequestFactory::fromGlobals();

//@todo на di
$router = new Router($request);
$router->boot();
