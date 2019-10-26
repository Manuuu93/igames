<?php

namespace components\middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FastRoute\RouteCollector;
use FastRoute;
use Zend\Diactoros\Response\HtmlResponse;

class RouterMiddleware implements MiddlewareInterface
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
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $routeInfo = $this->dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());

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