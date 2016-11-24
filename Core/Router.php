<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/16/2016
 * Time: 2:20 PM
 */
namespace Core;

class Router
{
    protected $routes = [];
    protected $params;

    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^'.$route.'$/i';

        $this->routes[$route] = $params;
    }


    public function match($url)
    {
        foreach($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                foreach ($matches as $key => $match){
                    if (is_string($key)){
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url))
        {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if(class_exists($controller))
            {
                $controller_object = new $controller();

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object, $action]))
                {
                    $controller_object->$action();
                }else{
                    echo "Method $action (in controller $controller) not found";
                }
            }else{
                echo "Controller class $controller not found";
            }
        }else{
            echo "No route matched.";
        }
    }

    /**
     * Convert the string with hyphens to StudlyCaps,
     * e.g. post-authors => PostAuthors
     *
     * @param string $string the string to convert
     *
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-',' ', $string)));
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.g. add-new => addNew
     *
     * @param string $string the string to convert
     *
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }


    /**
     *
     * Remove the query string variables from the URL (if any). A the full
     * query string is used for the route, any variables at the end will need
     * to be removed before the route is matched to the routing table.
     *
     * For example:
     *
     * URL                       $_SERVER['QUERY_STRING']       Route
     * _____________________________________________________________________
     *                                  |                       |
     * localhost                        | ''                    | ''
     * localhost/?                      | ''                    | ''
     * localhost/?page=1                | page=1                | ''
     * localhost/?posts?page=1          | posts&page = 1        | posts
     * localhost/?posts/index           | posts/index           | posts/index
     * localhost/?posts/index?page=1    | posts/index&page=1    | posts/index
     *
     * A URL of the format localhost/?page ( one variable name, no value) won't
     * work however. (NB. The .htaccess file converts the first ? to a & when
     * it's passed trough to the $_SERVER variable).
     *
     * @param string $url The full URL
     *
     * @return string The URL with with the query string variables removed
     */
    protected function removeQueryStringVariables( $url )
    {
        if ( $url != ''){
            $parts = explode('&', $url, 2);

            if( strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }else{
                $url = '';
            }
        }

        return $url;
    }



    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}