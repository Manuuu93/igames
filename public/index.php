<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Подключаем переменные окружения
Dotenv\Dotenv::create('../')->load();
// @todo тоже на di
$config = \components\Config::instance();

// Первичная настройка
ini_set('display_errors', $config->data['app']['debug']);
error_reporting(constant($config->data['app']['debug_level']));


//@todo на di
$router = new \components\Router();
$router->boot();
