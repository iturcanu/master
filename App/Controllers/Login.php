<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 12/29/2016
 * Time: 2:16 PM
 */

namespace App\Controllers;
use Core\Controller;
use Core\Model;
use \Core\View;

class Login extends \Core\Controller
{
    public static function indexAction(){
        View::renderDefault('Login/defaultView.php', 'Login/loginView.php', 'Login');
    }
}