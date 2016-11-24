<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/24/2016
 * Time: 4:16 PM
 */

namespace App\Controllers\Admin;


class Users extends \Core\Controller
{
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is loggen in for example
        // return false;
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo 'User admin index action';
    }
}