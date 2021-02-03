<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){

        return $this->routes['get'][$path] = $callback;
    }


    public function post($path, $callback)
    {
        return $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {

        $path   = $this->request->getPath();

        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){

            $this->response->setStatusCode(404);

            return "Not found";
        }


        if (is_string($callback))
            return $this->makeView($callback);

        return call_user_func($callback);
    }

    public function makeView(string $view)
    {
        $view = __DIR__."/../views/$view.php";

        include_once $view;
    }



}