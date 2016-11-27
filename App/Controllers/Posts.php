<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 10:25 AM
 */
namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    protected function indexAction()
    {
       $users = Post::getAll();
       View::render('Posts/index.php', ['users'=> $users]);
    }

    protected function addNewAction()
    {
        echo 'Hello from the addNew function in the Post controller';
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    protected function editAction()
    {
        echo 'Edit function';
        echo '<p>Route parameters <pre>'. htmlspecialchars(print_r($this->route_params, true)).'<br>'.htmlspecialchars(print_r($_GET, true)).'</pre></p>';
    }
}