<?php
    /**
     * Created by PhpStorm.
     * User: ioturcanu
     * Date: 11/15/2016
     * Time: 1:25 PM
     */
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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
    /*$router->add('posts', ['controller' => 'Tasks', 'action' => 'index']);
    $router->add('posts/new', ['controller' => 'Tasks', 'action' => 'new']);
    */
    $router->add('{controller}/{action}');
    $router->add('admin/{controller}/{action}');
    $router->add('{controller}/{id:\d+}/{action}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

    // Match the requested route and also a check for git

    $url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);