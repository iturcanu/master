<?php
namespace App\Controllers;
use Core\View;
use App\Libraries\Url;

class Controller_404 extends \Core\Controller
{
    function indexAction()
    {
        $home = "http://".Url::getHome();
        View::render('view404.php', 'Error');
    }
}