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
            $insert['task_deadline'] = date('Y-m-d H:i:s', strtotime($_POST['task_deadline']));
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

                $task_deadline = date('Y-m-d H:i:s', strtotime($task['deadline']));
                $post_deadline = date('Y-m-d H:i:s', strtotime($_POST['task_deadline']));
                if ($post_deadline != $task_deadline) {
                    $updated['deadline'] = $post_deadline;
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
                    $result = Task::updateTask($updated);
                    if ($result == true){
                        $message = "<div class=\"alert alert-success fade in alert-dismissable\" style=\"margin-top:18px;\">
                             <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                             Task modificat cu succes
                         </div>";
                        $task = Task::getById($id);
                        View::render('Tasks/editTask.php', 'Task updated', ['task' => $task, 'users' => $users, 'message' => $message]);
                    }else{
                        View::render('Tasks/editTask.php', 'Edit', ['task' => $task, 'users' => $users, 'message' => "The task wasn't updated<br> $result"]);
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
    
    protected function setStatusAction() {
        $task_id = $_GET['task_id'];
        $task_status_id = $_GET['status_id'];
        preg_match_all("/(\d+)/", $task_id, $output_array);
        $task_id = $output_array[1][0];
        $task_status = $_GET['task_status'];

        $result = Task::setStatus($task_id, $task_status_id);


        $message = "<div class=\"alert alert-success fade in alert-dismissable\" style=\"margin-top:18px;\">
                             <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                             Statutul taskului $task_id a fost setat ca \"$task_status\"
                         </div>";

        if($result == true){
            echo $message;
        }else{
            echo 'go home, tu esti bat';
        }

    }
}