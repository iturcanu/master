<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 1/16/2017
 * Time: 10:02 PM
 */

namespace App\Models;


use Core\Model;
use PDO;

class Depozit extends Model
{
    public $db;

    public function __construct(){
        $this->db = Model::getDB();
    }

    public function getAll(){
        $query = 'select d.id, d.name, d.quantity, d.created, cd.name as cat_name, CONCAT(u.first_name, \' \', u.last_name) as user_name from depozit d JOIN users u ON u.id = d.category JOIN categorii_depozit cd ON cd.id = d.category';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getById($id = 0){
        if($id != 0){
            $query = 'select d.id, d.name, d.description, d.quantity, d.created, d.category as category_id, cd.si, cd.name as cat_name, CONCAT(u.first_name, \' \', u.last_name) as user_name from depozit d JOIN users u ON u.id = d.category JOIN categorii_depozit cd ON cd.id = d.category WHERE d.id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return false;
        }
    }

    public function create($array = []){
        if(!empty($array)){
            return $array;
        }else{
            return 'empty array';
        }
    }

    public function getCategories(){
        $query = 'SELECT * FROM categorii_depozit';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCategoryUnit($category_id = 0){
        if($category_id != 0){
            $query = "SELECT si from categorii_depozit where id = :category_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return false;
        }
    }

    public function addItem($array = []){
        $query = 'INSERT into depozit (';
        $last = end($array);
        $last = key($array);

        foreach($array as $key => $value){
            $query .= '`'.$key.'`';
            if($key != $last){
                $query .= ', ';
            }else{
                $query .= " ";
            }
        }

        $query .= ') VALUES (';

        foreach($array as $key => $value){
            $query .= ':'.$key.'';
            if($key != $last){
                $query .= ', ';
            }else{
                $query .= " ";
            }
        }

        $query .= ')';
        $stmt = $this->db->prepare($query);

        foreach($array as $key => &$value){
            $stmt->bindParam(":$key", $value, PDO::PARAM_STR);
        }

        if($stmt->execute() == true){
            return 'success';
        }else{
            echo $query.'<br>';
            var_dump($stmt->errorInfo());/*
            var_dump($stmt->execute());
            var_dump($query);
            //return 'fara succes';
*/
        }


    }
}