<?php
namespace App\core;

class Router
{
    protected $routes = [
        'get' => [],
        'post' => []
    ];

    public static function load($file): static
    {

        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller): void
    {
        $this->routes['get'][$uri] = $controller;
    }

    public  function post($uri, $controller): void
    {
        $this->routes['post'][$uri] = $controller;
    }

    public function direct($uri,$requestType)
    {
        if(array_key_exists($uri,$this->routes[$requestType])){
            return $this->callAction(
                ...explode('@',$this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route defined for this URI');
    }

    public  function callAction($controller,$action)
    {
        $controller="App\\controllers\\{$controller}";
        $controller=new $controller;
        if(! method_exists($controller,$action)){
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }
}