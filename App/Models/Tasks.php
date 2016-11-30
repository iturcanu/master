<?php

namespace App\Models ;

use PDO;
use Core\Model;

class Tasks extends \Core\Model{
    
    public static function getAll()
    {
        
        try{
            $db = Model::getDB();
            
            $stmt = $db->query(' Select t.id, name, description, created, first_name, last_name from tasks t JOIN users u on t.assigned_to = u.id');
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
