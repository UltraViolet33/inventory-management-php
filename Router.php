<?php


class Router
{
    public function resolve(string $request_uri): void
    {
        $controller = 'product';
        $action = 'index';
        $params = [];

        if ($request_uri !== '/') {   
            $uri_explode = explode('/', $request_uri);
            
            if (count($uri_explode) > 1 && !empty($uri_explode[1])) {
                $controller = $uri_explode[1];
            }

            if (count($uri_explode) > 2 && !empty($uri_explode[2])) {
                $action = $uri_explode[2];
                if (str_contains($uri_explode[2], '?')) {
                    $action = explode('?', $uri_explode[2])[0];
                    $params = explode('?', $uri_explode[2])[1];
                    [$param_name, $param_value] = explode('=', $params);
                }
            }
        }

        $controller = ucfirst($controller);
        $controller = $controller . 'Controller';
        
        if (file_exists('controller/'.$controller. '.php')) {
            require_once('controller/'.$controller. '.php');
            $controller_class = new $controller();
        }
        
        if (method_exists($controller, $action)) {
             call_user_func_array([$controller_class, $action], []);
             die;
        }

        echo '404';
    }
}