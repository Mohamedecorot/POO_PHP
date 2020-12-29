<?php
namespace App\Controller\Admin;

use App;
use Core\Html\BootstrapForm;


class PostsController extends \App\Controller\AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index()
    {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add()
    {
        if(!empty($_POST)){
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result) {
                header('Location: admin.php?p=admin.posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}