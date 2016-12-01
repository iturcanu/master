<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/24/2016
 * Time: 7:15 PM
 */

namespace Core;


class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     *
     * @return void
     */
    public static function render($view, $pagetitle, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view"; //relative to Core directory

        $defaultView = '../App/Views/defaultView.php';

        if( is_readable($defaultView)) {
            require_once $defaultView;
        }else{
            echo $defaultView.' not found';
        }
    }

}