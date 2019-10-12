<?php

namespace components;

use FastRoute\RouteCollector;
use FastRoute;

class Router
{
    /**
     * @var FastRoute\Dispatcher
     */
    protected $dispatcher;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->dispatcher = FastRoute\simpleDispatcher($this->initRoutes());
    }

    /**
     *
     */
    public function boot(): void
    {
        $uri = $this->getRequestUri();
        $method = $this->getRequestMethod();
        $routeInfo = $this->dispatcher->dispatch($method, $uri);
        $this->handle($routeInfo);
    }

    /**
     * @return \Closure
     */
    protected function initRoutes(): \Closure
    {
        return function (RouteCollector $r) {
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
        };
    }

    /**
     * @return string
     */
    protected function getRequestUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        return  rawurldecode($uri);
    }

    /**
     * @return string
     */
    protected function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * @param array $routeInfo
     */
    protected function handle(array $routeInfo): void
    {
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                echo 'page not found';
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                echo 'method not allowed';
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                [$class, $method] = explode("/", $handler, 2);
                $class = 'Controllers\\' . $class;
                call_user_func_array([new $class(), $method], $vars);
                break;
        }
    }
}
