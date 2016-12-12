<?php

/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 10:25 AM
 */
namespace App\Controllers;

use \Core\View;
use App\Models\Tasks as Task;

class Tasks extends \Core\Controller
{
    protected function indexAction()
    {
       $tasks = Task::getAll();
       View::render('Tasks/list.php', 'Tasks' ,['tasks'=> $tasks]);
    }

    protected function addNewAction()
    {
        if(empty($_POST)) {
            $users = Task::getAllUsers();
            View::render('Tasks/createTask.php', 'Add new task', ['users'=> $users]);
        }else{
            $insert = [];
            $insert['task_title'] = $_POST['task_title'];
            $insert['assigned_to'] = $_POST['assigned_to'];
            $insert['task_deadline'] = date('Y-m-d', strtotime($_POST['task_deadline']));
            $insert['task_description'] = $_POST['task_description'];

            $users = Task::getAllUsers();
            if(Task::addTask($insert) == true){
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
    protected function editAction()
    {
        $id = $_GET['id'];
        $users = Task::getAllUsers();
        $task = Task::getById($id);
        View::render('Tasks/editTask.php', 'Edit', ['task'=> $task, 'users' => $users]);
    }

    protected function viewAction()
    {
        $id = $_GET['id'];
        $task = Task::getById($id);
        View::render('Tasks/singleView.php', 'Single View | Tasks', ['id' => $id, 'task' => $task]);

    }
}