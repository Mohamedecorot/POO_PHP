<?php
namespace App\Controller;

use App;
use Core\Controller\Controller;

class PostsController extends AppController{

    public function index()
    {
        $posts = App::getInstance()->getTable('Post')->last();
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function categories()
    {

    }

    public function show()
    {

    }

    public function category()
    {

    }

}