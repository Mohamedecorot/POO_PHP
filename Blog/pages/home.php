<h1>Homepage</h1>
<p><a href="index.php?p=single">Single</a></p>
<?php

use App\Table\Article;
use App\Table\Categorie;
//pour se connecter à la bdd
// $pdo = new PDO ('mysql:dbname=blog;host=localhost', 'root', 'root');

// //pour voir les erreurs
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// //requete sql
// //$count = $pdo->exec('INSERT INTO articles SET titre="mon titre", contenu="mon contenu", date="' . date('Y-m-d H:i:s') .'"');

// //pour récuperer les articles
// $resultat = $pdo->query('SELECT * FROM articles');
// $datas = $resultat->fetchAll(PDO::FETCH_OBJ);
// var_dump($datas[0]->titre);
?>

<div class="row">
  <div class="col-sm-8">
    <?php foreach (Article::getLast() as $post): ?>
      <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
      <p><em><?= $post->categorie; ?></em></p>
      <p><?= $post->extrait; ?></h2></p>
    <?php endforeach ?>
  </div>
  <div class="col-sm-4">
    <ul>
      <?php foreach(Categorie::all() as $categorie): ?>
        <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>