<?php

namespace App\Models ;

use PDO;
use Core\Model;

class Tasks extends \Core\Model{

    protected $db = '';

    public function __construct(){
        $this->db = Model::getDB();
    }
    
    public static function getAll()
    {

        try{
            $db = Model::getDB();

            $stmt = $db->query(' Select t.id, name, description, created, deadline, CONCAT(first_name,\' \', last_name) as username, avatar from tasks t JOIN users u on t.assigned_to = u.id');

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getById($id)
    {

        try{
            $db = Model::getDB();

            $stmt = $db->prepare('Select t.id, name, description, created, deadline, CONCAT(first_name,\' \', last_name) as username, assigned_to, u.id as userId, avatar  from tasks t JOIN users u on t.assigned_to = u.id Where t.id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;

        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getAllUsers()
    {

        try{
            $db = Model::getDB();

            $stmt = $db->prepare('Select id, CONCAT(first_name,\' \', last_name) as name FROM users');
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }


    public static function addTask($insert = [])
    {
        try{
            extract($insert);
            $db = Model::getDB();
            $querry = "insert into tasks(`name`, `description`, `reported_by`, `assigned_to`, `deadline`) VALUES ('$task_title', '$task_description', 1, :assigned_to, '$task_deadline')";
            $stmt = $db->prepare($querry);
            $stmt->bindParam(':assigned_to', $assigned_to, PDO::PARAM_INT);
            $result = $stmt->execute();

            return $result;

        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function updateTask($update = [])
    {

        if(!empty($update) && !empty($update['id'])){
            $id = $update['id'];
            unset($update['id']);

            $last = end($update);
            $last = key($update);

            $query = "Update tasks SET ";
            foreach($update as $key => $value){
                $query .= '`'.$key.'` = "'.$value.'"';
                if($key != $last){
                    $query .= ', ';
                }else{
                    $query .= " ";
                }
            }
            $query .= "Where id = ".$id;

            $db = Model::getDB();
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
            if($result == true) {
                return $result;
            }else{
                return $stmt->errorInfo();
            }
            return $query;
        }else{
            return false;
        }
    }

    public static function getStatuses()
    {

        try{
            $db = Model::getDB();

            $stmt = $db->prepare('Select id, name FROM task_status where id != 4');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function setStatus($task_id, $status_id)
    {
        if(isset($task_id) && !empty($task_id) && isset($status_id) && !empty($status_id)) {
            try {
                $db = Model::getDB();

                $query = "update tasks set task_status = :status_id where id = :task_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
                $stmt->bindParam(':status_id', $status_id, PDO::PARAM_INT);

                $result = $stmt->execute();

                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


}