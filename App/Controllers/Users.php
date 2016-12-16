<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 10:25 AM
 */
namespace App\Controllers;

use \Core\View;
use App\Models\Users as User;

class Users extends \Core\Controller
{
    protected function indexAction()
    {
        $tasks = Users::getAll();
        View::render('Tasks/list.php', 'Tasks' ,['tasks'=> $tasks]);
    }

    protected function addNewAction()
    {
        if(empty($_POST)) {
            $users = User::getAllUsers();
            View::render('Tasks/createTask.php', 'Add new task', ['users'=> $users]);
        }else{
            $insert = [];
            $insert['task_title'] = $_POST['task_title'];
            $insert['assigned_to'] = $_POST['assigned_to'];
            $insert['task_deadline'] = date('Y-m-d', strtotime($_POST['task_deadline']));
            $insert['task_description'] = $_POST['task_description'];

            $users = User::getAllUsers();
            if(User::addTask($insert) == true){
                $message = "<div class=\"alert alert-success fade in alert-dismissable\" style=\"margin-top:18px;\">
                     <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                     Your task has been added
                 </div>";
                View::render('Tasks/createTask.php', 'Add new task', ['message'=> "$message", 'users'=> $users]);
            }
        }
    }

    /**
     * Show the edit page
     *
     * @return void
     */

    protected function viewAction()
    {
        $id = $_GET['id'];
        $task = User::getById($id);
        View::render('Tasks/singleView.php', 'Single View | Tasks', ['id' => $id, 'task' => $task]);

    }
}