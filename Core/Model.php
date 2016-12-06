<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use PDO;

/**
 * Description of Model
 *
 * @author John
 */
class Model {
    protected static function getDB()
    {   
        static $db = null;
        
        if($db === null){
            $host = 'localhost';
            $user = 'root';
            $password = 'root';
            $dbName = 'erp';
        
        
            try{
                $db = new PDO("mysql:host=$host; dbname=$dbName;",$user, $password);
                return $db;

            }  catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}
