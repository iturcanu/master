<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/16/2016
 * Time: 2:20 PM
 */
class Router
{
    protected $routes = [];
    protected $params;

    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
        /*
        foreach($this->routes as $route => $params)
        {
            if($url == $route)
            {
                $this->params = $params;
                return true;
            }
        }*/

        $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        if (preg_match($reg_exp, $url, $matches))
        {
            // Get named capture group values
            $params = [];

            foreach ($matches as $key => $match)
            {
                if(is_string($key))
                {
                    $params[$key] = $match;
                }
            }

            $this->params = $params;
            return true;
        }



        return false;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}