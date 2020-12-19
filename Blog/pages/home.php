<h1>Homepage</h1>
<p><a href="index.php?p=single">Single</a></p>
<?php

use App\App;
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

<ul>
  <?php foreach (App::getDb()->query('SELECT * FROM articles', 'App\Table\Article') as $post): ?>
    <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
    <p><?= $post->extrait; ?></h2></p>
  <?php endforeach ?>
</ul>