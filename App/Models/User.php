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
    private $db;
    private $id ;
    private $login ;
    private $password ;
    private $email ;
    private $first_name ;
    private $last_name;
    private $birthDate;
    private $avatar;
    private $biography;
    private $obj;

    public function __construct()
    {
        $this->db = $this->getDB();
    }

    public function getUserByEmail($email = '')
    {
        $db = Model::getDB();
        //$this->db->getDB();
        if(isset($email) && !empty($email)){
            $querry = 'Select u.*, r.name as functie from users u JOIN user_roles r on r.id = u.role where u.email = :email';
            $stmt = $db->prepare($querry);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }else{
            return 'emailul nu a fost setat';
        }
    }


    public function setEmail($email)
    {
        $this->isNew['email'] = True;
        $this->email = $email;
    }

    public function setSurname($surname)
    {
        $this->isNew['surname'] = True;
        $this->surname = $surname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getFullName()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getBiography()
    {
        return $this->biography;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setUserColumn()
    {
        return  array(  'login' => $this->getLogin(),
            'email' => $this->getEmail(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'avatar' => $this->getAvatar,
            'biography' => $this->getBiography()
        );
    }

    public function createUser($first_name, $last_name, $email, $login, $password, $birthDate)
    {
        $sql = "INSERT INTO user(first_name, last_name, email, login, password, birthDate) VALUES(:first_name, :last_name, :email, :login, :password, :birthDate)";

        $first_name = Filter::value($first_name);
        $last_name = Filter::value($last_name);
        $email = Filter::value($email);
        $login = Filter::value($login);
        $password = Filter::value($password);
        $birthDate = Filter::value($birthDate);

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $sth->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);

        try {
            $sth->execute();
            return $sth->errorInfo();
        } catch (PDOException $e) {
            Logging::register()->error($e->getMessage());
            return $sth->errorInfo();
        }
    }

    public function updateUser($userId, $first_name, $last_name, $birthDate, $email, $avatar){
        if($this->id == 0 ){
            $this->obj = $this->getUserById($userId);
        }
        $sql = "UPDATE users SET ";
        $querry = array();

        if ($this->obj->getEmail() !== $email) {
            $email = Filter::value($email);
            $querry['sql'][] = "email = :email";
            $querry['params']['email'] = $email;
        }

        if ($this->obj->getFirstName() !== $first_name) {
            $first_name = Filter::value($first_name);
            $querry['sql'][] = "first_name = :first_name";
            $querry['params']['first_name'] = $first_name;
        }

        if ($this->obj->getLastName() !== $last_name) {
            $last_name = Filter::value($last_name);
            $querry['sql'][] = "last_name = :last_name";
            $querry['params']['last_name'] = $last_name;
        }

        if ($this->obj->getBirthDate() !== $birthDate) {
            $birthDate = Filter::value($birthDate);
            $querry['sql'][] = "birthDate = :birthDate";
            $querry['params']['birthDate'] = $birthDate;
        }

        if ($this->obj->getAvatar() !== $avatar) {
            $avatar = Filter::value($avatar);
            $querry['sql'][] = "avatar = :avatar";
            $querry['params']['avatar'] = $avatar;
        }

        $sql = "UPDATE user SET ";

        foreach($querry['sql'] as $key=>$stmt){
            if($key > 0){
                $sql .= ', '.$stmt;
            }else{
                $sql .= $stmt;
            }
        }
        $sql .= " WHERE id = :userId";


        $sth = $this->db->prepare($sql);

        $sth->bindParam('userId', $userId, PDO::PARAM_INT);

        foreach($querry['params'] as $key=>$value){
            $sth->bindParam(":$key", $querry['params'][$key], PDO::PARAM_STR);
        }


        try {
            $sth->execute();
            Logging::register()->info("The user with id $userId was updated succesfully ".$sql);
            Logging::register()->debug($sql);
            return True;
        } catch (PDOException $e) {
            Logging::register()->error($e->getMessage());
            return False;
        }
    }

    public function updateUserPassword($userId, $password){
        if($this->id == 0 ){
            $this->obj = $this->getUserById($userId);
        }
        $sql = "UPDATE user SET ";
        if ($this->obj->getPassword() !== $password) {
            $password = Filter::value($password);
            $sql .= "password = :password";
            $sql .= " WHERE id = :userId";
        }
        $sth = $this->db->prepare($sql);
        $sth->bindParam('password', $password, PDO::PARAM_STR);
        $sth->bindParam('userId', $userId, PDO::PARAM_STR);

        try {
            $sth->execute();
            Logging::register()->info("The user with id $userId succesfully updated his password ".$sql);
            return True;
        } catch (PDOException $e) {
            Logging::register()->error($e->getMessage());
            return False;
        }
    }


    public function getUserById($id){
        $db = Model::getDB();
        $sql = ' SELECT users.id, CONCAT(first_name, \' \', last_name) as user_name, avatar, email, r.name as functie from users JOIN user_roles r on r.id = users.role where users.id = :id';
        $sth = $db->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            //Logging::register()->error($e->getMessage());
            return False;
        }
    }


    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();
        if($result == True){
            return True ;
        }else{
            return $sth->errorInfo();
        }
    }

    public function toJSON() {
        return json_encode([
            'id' => $this->id,
            'login' => $this->login ,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthDate' => $this->birthDate,
            'avatar' => $this->avatar,
            'biography'=> $this->biography
        ]) ;
    }

    public function getAllUsers(){
        $db = $this->db;

        $sql = 'SELECT users.id, CONCAT(first_name, \' \', last_name) as user_name, avatar, email, r.name as functie from users JOIN user_roles r on r.id = users.role';

        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result == True){
            return $result;
        }else{
            return $sth->errorInfo();
        }
    }

}