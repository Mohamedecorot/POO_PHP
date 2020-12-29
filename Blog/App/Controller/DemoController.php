<?php
namespace App\Controller;

use Core\Database\QueryBuilder;

class DemoController extends AppController{

    public function index()
    {
        $query = new QueryBuilder();
        // $query->where('id = 1');
        // $query->select('id', 'titre', 'contenu');
        // $query->from('article', 'Post');
        // echo $query->getQuery();
        //Equivalent en fluent à ça :
        echo $query->select('id', 'titre', 'contenu')
            ->from('article', 'Post')
            ->where('Post.category_id = 1')
            ->where('Post.date > NOW()');
        //Equivalent en facade à ça :
        require ROOT . '/Query.php';
        echo \Query::select('id', 'titre', 'contenu')
            ->from('article', 'Post')
            ->where('Post.category_id = 1')
            ->where('Post.date > NOW()');
    }

}