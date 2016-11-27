<?php

namespace App\Models ;

use PDO;
use Core\Model;

class Post extends \Core\Model{
    
    public static function getAll()
    {
        
        try{
            $db = Model::getDB();
            
            $stmt = $db->query('Select id, first_name, last_name, register_date from users');
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }  catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}
