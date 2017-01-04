<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\User as UserModel;
use App\Libraries\Session;
use Core\View;
use App\Libraries\Url;
use App\Libraries\Validation;
use App\Libraries\Upload;
use App\Libraries\Filter;

class User extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function indexAction()
    {
        $users = $this->model->getAllUsers();
        View::render('User/list.php', 'All Users', ['users' => $users]);

    }

    public function viewAction()
    {
        $id = $_GET['id'];
        $user = $this->model->getUserById($id);
        View::render('User/userView.php', 'Users : ' . $user['user_name'], ['user' => $user]);
    }


    static function createUser($first_name, $last_name, $email, $login, $password)
    {
        //include_once '../models/user.php';
        $model = new User();
        $user = $model->createUser($first_name, $last_name, $email, $login, $password);
    }

    function editAction()
    {
        $user = $this->model->getUserById(Session::get('userId'));
        $result = '';

        if (!empty($_POST)) {
            $update['id'] = Session::get('userId');
            $response = array();
            if (isset($_POST['first_name'])) {
                $response[] = Validation::string($_POST['first_name'], 'first name');
            } else {
                $result .= "first name can't be empty";
            }
            if (Filter::value($_POST['first_name']) != $user['first_name']) {
                $update['first_name'] = Filter::value($_POST['first_name']);
            }

            if (isset($_POST['last_name'])) {
                $response[] = Validation::string($_POST['last_name'], 'last name');
            } else {
                $result .= "last name can't be empty";
            }
            if (Filter::value($_POST['last_name']) != $user['last_name']) {
                $update['last_name'] = Filter::value($_POST['last_name']);
            }


            if (isset($_POST['email'])) {
                $response[] = Validation::email($_POST['email'], 'email');
            } else {
                $result .= "email can't be empty";
            }
            if (Filter::value($_POST['email']) != $user['email']) {
                $update['email'] = Filter::value($_POST['email']);
            }

            $avatar = new Upload();
            $avatar_response = $avatar->image($_FILES['avatar'], Session::get('userId'));

            if (isset($avatar_response['error'])) {
                $response[] = $avatar_response['error'];
            }

            if (!empty($avatar_response['success'])) {
                $avatar_name = $avatar_response['success'];
                $update['avatar'] = $avatar_name;
            } else {
                $avatar_name = $user['avatar'];
            }

            foreach ($response as $key => $value) {
                if (!empty($value) && !is_array($value)) {
                    $result .= $value . '<br>';
                } elseif (is_array($value)) {
                    foreach ($value as $val) {
                        $result .= $val . '<br>';
                    }
                }
            }

            if (empty($result)) {

                //$result = $model->updateUser(Session::get('userId'), $_POST['first_name'], $_POST['last_name'], $_POST['birthDate'], $_POST['email'], $avatar_name);
                if (!empty($update)) {
                    echo "<pre>";
                    //var_dump($update);
                    if (!empty($update) && !empty($update['id'])) {
                        $id = $update['id'];
                        unset($update['id']);

                        $last = end($update);
                        $last = key($update);

                        $query = "Update users SET ";
                        $id = 0;
                        foreach ($update as $key => $value) {
                            $query .= '`' . $key . '` = ":' . $key . '"';
                            if ($key != $last) {
                                $query .= ', ';
                            } else {
                                $query .= " ";
                            }
                            $bind[$id]['key'] = $key;
                            $bind[$id]['value'] = $value;
                            $id++;
                        }
                        $query .= "Where id = " . $id;

                        foreach ($bind as $key=>$item) {
                            echo "bindParam(':$item[key]', '$item[value]', PDO::PARAM_STR)<br>";
                        }
                        echo $query;
                        //var_dump($bind);
                        echo "</pre>";
                    } else {
                        echo 'Nui nimic de facut update';
                    }
                    $url = Url::getHome();
                    //zheader("Location: $url");
                }
            }else {
                    $error = $result;
                    $user = $this->model->getUserById(Session::get('userId'));
                    View::render('User/update.php', 'Update error', ['user' => $user, 'message' => $error]);
            }
        } else {
            $user = $this->model->getUserById(Session::get('userId'));
            //var_dump($user);
            View::render('User/update.php', 'Update', ['user' => $user]);
        }
    }

        function action_update_password()
        {

            $model = new User();
            $user = $model->getUserById(Session::get('userId'));
            $result = '';

            if (!empty($_POST)) {
                $response = array();

                if (isset($_POST['password']) && isset($_POST['password_confirmation'])) {
                    if ($_POST['password'] !== $_POST['password_confirmation']) {
                        $response[] = 'The passwords don\'t match';
                    } else {
                        if ($user->getPassword() != md5($_POST['actual_password'])) {
                            $result .= 'The actual password is not valid<br>';
                        }
                        $response[] = Validation::password($_POST['password']);
                    }
                } else {
                    $result .= "password can't be empty";
                }

                foreach ($response as $key => $value) {
                    if (!empty($value) && !is_array($value)) {
                        $result .= $value . '<br>';
                    } elseif (is_array($value)) {
                        foreach ($value as $val) {
                            $result .= $val . '<br>';
                        }
                    }
                }


                if (empty($result)) {

                    //$result = $model->updateUser($_SESSION['userId'], $_POST['first_name'], $_POST['last_name'], $_POST['birthDate'], $_POST['email'], $avatar_name);

                    $result = $model->updateUserPassword(Session::get('userId'), md5($_POST['password']));

                    $url = URL::getHome();
                    header("Location: //$url");
                } else {
                    $data['error'] = $result;
                    $data['user'] = $model->getUserById(Session::get('userId'));
                    $this->view->generate('update_password_view.php', 'main_view.php', $data);
                }
            } else {
                $data['user'] = $model->getUserById(Session::get('userId'));
                $this->view->generate('update_password_view.php', 'main_view.php', $data);
            }
        }



}
?>