<?php



/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 11/23/2016
 * Time: 10:25 AM
 */
namespace App\Controllers;

use Core\Model;
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

        if(empty($_POST)) {
            $task = Task::getById($id);
            if($task == false) {
                View::render('emptyView.php', 'Error', ['message' => 'This task doesn\'t exists']);
            }else {
                View::render('Tasks/editTask.php', 'Edit', ['task' => $task, 'users' => $users]);
            }
        }else{
            $task = Task::getById($id);
            if($task == false) {
                View::render('emptyView.php', 'Error', ['message' => 'This task doesn\'t exists']);
            }else{
                $updated = [];
                $updated['id'] = $id;
                if ($task['name'] != $_POST['task_title']) {
                    $updated['name'] = $_POST['task_title'];
                }
                if ($task['assigned_to'] != $_POST['assigned_to']) {
                    $updated['assigned_to'] = $_POST['assigned_to'];
                }
                if (date('Y-m-d H:m', strtotime($task['deadline'])) != date('Y-m-d H:m', strtotime($_POST['task_deadline']))) {
                    $updated['deadline'] = date('Y-m-d H:m', strtotime($_POST['task_deadline']));
                }

                $var = trim(($_POST['task_description']));
                $server_var = trim($task['description']);

                $pattern = "=^<p>(.*)</p>$=i";
                if(preg_match($pattern, $var, $matches) == true){
                    $var = $matches[1];
                }
                /*
                echo "<pre>";
                var_dump($var);
                echo $server_var;
                die();
                */
                if ($server_var != $var) {
                    $updated['description'] = $var;
                }

                if (!empty($updated)) {
                    if (Task::updateTask($updated) == true){
                        $task = Task::getById($id);
                        $message = "<div class=\"alert alert-success fade in alert-dismissable\" style=\"margin-top:18px;\">
                             <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                             Task modificat cu succes
                         </div>";

                        View::render('Tasks/editTask.php', 'Task updated', ['task' => $task, 'users' => $users, 'message' => $message]);
                    }
                } else {
                        View::render('Tasks/editTask.php', 'Edit', ['task' => $task, 'users' => $users, 'message' => "The task wasn't updated"]);
                }
            }

        }

    }

    protected function viewAction()
    {
        $id = $_GET['id'];
        $task = Task::getById($id);
        $statuses = Task::getStatuses();
        if($task == false) {
            View::render('emptyView.php', 'Error', ['message' => 'This task doesn\'t exists']);
        }else {
            View::render('Tasks/singleView.php', 'Single View | Tasks', ['id' => $id, 'task' => $task, 'statuses' => $statuses]);
        }
    }
}