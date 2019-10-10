<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
// Первичная настройка
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключение файлов
define('ROOT', dirname(__FILE__));

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'SiteController/actionIndex');
    $r->addRoute('GET', '/teams', 'TeamController/actionIndex');
    $r->addRoute('GET', '/teams/show/{id:\d+}', 'TeamController/actionShow');
    $r->addRoute('GET', '/players', 'PlayerController/actionIndex');
    $r->addRoute('GET', '/players/show/{id:\d+}', 'PlayerController/actionShow');
    $r->addRoute('GET', '/championships', 'ChampionshipController/actionIndex');
    $r->addRoute('GET', '/championships/show/{id:\d+}', 'ChampionshipController/actionShow');
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'page not found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'method not allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        $class = 'controllers\\' . $class;
        call_user_func_array(array(new $class, $method), $vars);
        break;
}