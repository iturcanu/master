<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 4:57 PM
 */

namespace App\Controllers;


class Home extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        echo "Hello from the index action in the HomeController";
    }

    /**
     *Before filter - called before an action method.
     *
     *@return void
     */
    protected function before()
    {
        echo "(before)";
        return false;
    }

    /**
     * After filter - called after an action method
     *
     * @return void
     */
    protected function after()
    {
        echo "(after)";
    }

}