<?php

namespace components;

use FastRoute\RouteCollector;
use FastRoute;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class Router
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var FastRoute\Dispatcher
     */
    protected $dispatcher;

    /**
     * Router constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
        $this->dispatcher = FastRoute\simpleDispatcher($this->initRoutes());
    }

    /**
     * @return ResponseInterface
     */
    public function handle(): ResponseInterface
    {
        $routeInfo = $this->dispatcher->dispatch($this->request->getMethod(), $this->request->getUri()->getPath());

        $response = null;
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                $response = new HtmlResponse('Not found', 404);
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $response = new HtmlResponse('method not allowed', 405);
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                [$class, $method] = explode("/", $handler, 2);
                $class = 'Controllers\\' . $class;
                $response = call_user_func_array([new $class(), $method], $vars);
                break;
        }

        return $response;
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
        };
    }
}
