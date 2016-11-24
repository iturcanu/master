<?php
    /**
     * Created by PhpStorm.
     * User: ioturcanu
     * Date: 11/15/2016
     * Time: 1:25 PM
     */

    spl_autoload_register(function ( $class){
        $root = dirname(__DIR__); //get the parent directory
        $file  =$root.'/'.str_replace('\\', '/', $class) . '.php';
        if (is_readable($file)) {
            require_once $root .'/'. str_replace('\\', '/', $class) .'.php';
        }
});

    $router = new Core\Router();


    // Add the routes

    $router->add('', ['controller' => 'Home', 'action' => 'index']);
    /*$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
    $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    */
    $router->add('{controller}/{action}');
    $router->add('admin/{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');

    // Display the routing table
    echo '<pre>';
   // echo htmlspecialchars(print_r($router->getRoutes(), TRUE));
    echo '</pre>';

    // Match the requested route and also a check for git

    $url = $_SERVER['QUERY_STRING'];
/*
    if ($router->match( $url) )
    {
        echo '<pre>';
        var_dump($router->getParams());
        echo '</pre>';
    }else
    {
        echo 'No route found for URL '.$url;
    }
*/
$router->dispatch($url);