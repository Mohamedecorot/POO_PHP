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
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result) {
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete()
    {
        if(!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }
}