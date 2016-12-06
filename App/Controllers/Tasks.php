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
            var_dump($_POST);
            $insert = [];
            $insert['task_title'] = $_POST['task_title'];
            $insert['assigned_to'] = $_POST['assigned_to'];
            $insert['task_deadline'] = date('Y-m-d', strtotime($_POST['task_deadline']));
            $insert['task_description'] = $_POST['task_description'];


            if(Task::addTask($insert) == true){
                echo 'Row was inserted succesfully';
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

    }

    protected function viewAction()
    {
        $id = $_GET['id'];
        $task = Task::getById($id);
        View::render('Tasks/singleView.php', 'Single View | Tasks', ['id' => $id, 'task' => $task]);

    }
}