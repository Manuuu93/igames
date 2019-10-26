<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use components\middleware\RouterMiddleware;
use Dotenv\Dotenv;
use components\Config;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Zend\Stratigility\MiddlewarePipe;

// Подключаем переменные окружения
Dotenv::create('../')->load();
// @todo тоже на di
$config = Config::instance();

// Первичная настройка
ini_set('display_errors', $config->data['app']['debug']);
error_reporting($config->data['app']['debug_level']);

$request = ServerRequestFactory::fromGlobals();

//@todo на di
$pipeline = new MiddlewarePipe();
$pipeline->pipe(new RouterMiddleware());
$response = $pipeline->handle($request);

$emitter = new SapiEmitter();
$emitter->emit($response);