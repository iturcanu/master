<?php
/**
 * Created by PhpStorm.
 * User: ioturcanu
 * Date: 1/13/2017
 * Time: 10:49 PM
 */

namespace App\Controllers;

use App\Libraries\Filter;
use App\Libraries\Message;
use Core\Controller;
use Core\View;
use App\Models\Depozit as DepozitModel;
use App\Libraries\Url;

class Depozit extends Controller
{
    protected $model;

    public function __construct(){
        $this->model = new DepozitModel();
    }

    protected function indexAction(){
        $items = $this->model->getAll();
        //var_dump($items);
        View::render('Depozit/list.php', 'Depozit', ['items' => $items]);
    }

    protected function viewAction(){
        if(isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $item = $this->model->getById($id);
            if(is_array($item)) {
                View::render('Depozit/singleView.php', 'Depozit - ' . $item['name'], ['item' => $item]);
            }else{
                header('location:'.Url::getHome().'/depozit');
            }
        }else{
            header('location:'.Url::getHome().'/depozit');
        }
    }

    protected function addNewAction(){
        $categories = $this->model->getCategories();
        if(empty($_POST)){
            View::render('Depozit/createItem.php', 'Adaugă în depozit', ['categories' => $categories]);
        }else{
            $insert = [];
            $insert['name'] = Filter::value($_POST['item_name']);
            $insert['category'] = Filter::value($_POST['category']);
            $insert['quantity'] = Filter::value($_POST['quantity']);
            $insert['description'] = Filter::textarea($_POST['description']);
            $insert['created_by'] = Filter::value($_SESSION['userId']);

            if($this->model->addItem($insert) == true){
                $items = $this->model->getAll();
                $message = Message::success('Itemul a fost adăugat cu succes');
                View::render('Depozit/list.php', 'Depozit', ['items' => $items, 'message' => $message]);
            }else{
                $message = Message::error('Înscrierea nu a avut loc');
                View::render('Depozit/createItem.php', 'Adaugă în depozit', ['categories' => $categories, 'message' => $message]);
            }
        }
    }

    protected function editAction(){
        if(isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $item = $this->model->getById($id);
            $categories = $this->model->getCategories();
            if(is_array($item)) {
                View::render('Depozit/editView.php', 'Depozit - ' . $item['name'], ['item' => $item, 'categories' => $categories]);
            }else{
                header('location:'.Url::getHome().'/depozit');
            }
        }else{
            header('location:'.Url::getHome().'/depozit');
        }
    }

    protected function getCategoryUnitAction(){
        if(isset($_GET['category_id'])){
            $id = intval($_GET['category_id']);
            $result = $this->model->getCategoryUnit($id);
            if($result != false){
                echo $result['si'];
            }else{
                echo 'false';
            }
        }else{
            echo false;
        }
    }
}