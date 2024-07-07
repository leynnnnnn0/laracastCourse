<?php

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] =
            [
                'uri' => $uri,
                'controller' => $controller,
                'method' => $method,
                'middleware' => null
            ];

        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add("GET", $uri, $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add("POST", $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add("PUT", $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply the middleware
                Middleware::resolve($route['middleware']);
                // if($route['middleware'] === 'auth')
                // {
                //     (new Auth)->handle();
                // }
                return require_once $route['controller'];
            }
        }
        $this->abort();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require_once 'views/' . $code . '.php';
        die();
    }
}

// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $routes = require_once 'routes.php';
// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         return require $routes[$uri];
//     } else {
//         abort();
//     }
// }



// routeToController($uri, $routes);
