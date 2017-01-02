<?php
namespace App\Controllers;
use Core\Controller;

class Logout extends Controller
{
    public function indexAction()
    {        
        setcookie('PHPSESSID', '');
        session_destroy();
        header("Location: //".$_SERVER['SERVER_NAME']);
    }
}