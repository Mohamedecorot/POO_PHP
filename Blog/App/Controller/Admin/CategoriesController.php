<?php
namespace App\Controller\Admin;

use App;
use Core\Html\BootstrapForm;


class PostsController extends \App\Controller\AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index()
    {
        $items = $this->Category->all();
        $this->render('admin.posts.index', compact('items'));
    }

    public function add()
    {
        if(!empty($_POST)){
            $result = $this->Category->create([
                'titre' => $_POST['titre']
            ]);
            return $this->index();
        }
        $this->render('admin.posts.edit', compact('form'));
    }

    public function edit()
    {
        if(!empty($_POST)){
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre']
            ]);
            return $this->index();
        }
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.posts.edit', compact('form'));
    }

    public function delete()
    {
        if(!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }
}