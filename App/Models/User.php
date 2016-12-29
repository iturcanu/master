<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 12/29/2016
 * Time: 8:14 PM
 */

namespace App\Models;
use \Core\Model;
use PDO;

class User extends \Core\Model
{
    public function __construct()
    {
        $this->db = Model::getDB();
    }

    public static function getUserById(){

    }

    public static function getUserByEmail($email = '')
    {
        $db = Model::getDB();
        if(isset($email) && !empty($email)){
            $querry = 'Select * from users where email = :email';
            $stmt = $db->prepare($querry);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }else{
            return 'emailul nu a fost setat';
        }
    }
}