<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/24/2016
 * Time: 7:15 PM
 */

namespace Core;

use \App\Libraries\Url;


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
        $home = Url::getHome();
        extract($args, EXTR_SKIP);
        if(file_exists('../App/Views/'.$view)){
            $file = "../App/Views/$view";
        }else{
            $file = "../App/Views/prosta.php";
        }

        $defaultView = '../App/Views/defaultView.php';

        if(is_readable($defaultView)) {
            require_once $defaultView;
        }else{
            echo $defaultView.' not found';
        }
    }

}