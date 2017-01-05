<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 12/29/2016
 * Time: 2:16 PM
 */

namespace App\Controllers;
use App\Libraries\Message;
use App\Libraries\Url;
use App\Libraries\Validation;
use App\Models\User;
use Core\Controller;
use Core\Model;
use \Core\View;

class Login extends \Core\Controller
{
    public static function indexAction()
    {
        if (empty($_POST)) {
            View::renderDefault('Login/defaultView.php', 'Login/loginView.php', 'Login');
        }elseif(isset($_POST['email'])){
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $model = new User();
            $user = $model->getUserByEmail($email);
            if($user != false && is_array($user)){
                $user = $user[0];
                if($user['password'] === md5($password)) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userEmail'] = $user['email'];

                    $_SESSION['user_name'] = $user['first_name'].' '.$user['last_name'];
                    $_SESSION['avatar'] = $user['avatar'];
                    $_SESSION['functie'] = $user['functie'];

                    header('Location: ' . Url::getHome());
                }else{
                    $message = Message::error('Login sau parolă introdusă incorect');
                    View::renderDefault('Login/defaultView.php', 'Login/loginView.php', 'Login', ['error_message' => $message]);
                }
            }else{
                $message = Message::error('Login sau parolă introdusă incorect');
                View::renderDefault('Login/defaultView.php', 'Login/loginView.php', 'Login', ['error_message' => $message]);
            }
        }
    }
}