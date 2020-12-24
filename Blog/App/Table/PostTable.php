<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table {

    protected $table = 'articles';

    /**
     * Recupere les derniers articles
     * @return array
     */
    public function last()
    {
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY articles.date DESC");
    }

    /**
     * Recupere un article en liant la catégorie associée
     * @return array
     */
    public function find($id)
    {
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.id = ?", [$id], true);
    }
}