<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 4:57 PM
 */

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        $params = $_GET;
        View::render('Home/index.php', 'Home');
    }

    /**
     *Before filter - called before an action method.
     *
     *@return void
     */
    protected function before(){}

    /**
     * After filter - called after an action method
     *
     * @return void
     */
    protected function after(){}


}