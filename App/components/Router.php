<?php

namespace App\components;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include(ROOT . '/App/config/routes.php');
    }

    private function getURI()
    {
        $uri = $_SERVER['REQUEST_URI'] ?? null;
        if ($uri)
            return trim($uri, '/');
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {
            if(preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $controllerName =  'App\controllers\\' . ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;
                $controllerObject = new $controllerName();
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null) {
                    break;
                }
            }
        }
    }
}