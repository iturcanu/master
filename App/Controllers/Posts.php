<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 10:25 AM
 */
namespace App\Controllers;

class Posts
{
    public function index()
    {
        echo 'Hello from the index function in the Post controller';
        echo '<p>Query string parameters <pre>'. htmlspecialchars(print_r($_GET, true)).'</pre></p>';
    }

    public function addNew()
    {
        echo 'Hello from the addNew function in the Post controller';
    }


}