<?php
use App\components\Router;
require_once('autoload.php');
// Первичная настройка
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключение файлов
define('ROOT', dirname(__FILE__));

// Роутинг
$router = new Router();

try {
    $router->run();
} catch (Exception $x) {
    include_once __DIR__ . '/App/views/404.php';
}