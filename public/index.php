<?php
    /**
     * Created by PhpStorm.
     * User: ioturcanu
     * Date: 11/15/2016
     * Time: 1:25 PM
     */
//    echo 'Requested URL ="' .$_SERVER['QUERY_STRING'] .'"';

    require '../Core/Router.php';

    $router = new Router();

    //echo get_class($router);

    // Add the routes

    $router->add('', ['controller' => 'Home', 'action' => 'index']);
    $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
    $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    $router->add('{controller}/{action}');
    $router->add('admin/{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');

    // Display the routing table
    echo '<pre>';
   // echo htmlspecialchars(print_r($router->getRoutes(), TRUE));
    echo '</pre>';

    // Match the requested route and also a check for git

    $url = $_SERVER['QUERY_STRING'];
    if ($router->match( $url) )
    {
        echo '<pre>';
        var_dump($router->getParams());
        echo '</pre>';
    }else
    {
        echo 'No route found for URL '.$url;
    }