<H1>home</H1>

<p><a href="index.php?p=single">single</a></p>

<?php
//pour se connecter à la bdd
$pdo = new PDO ('mysql:dbname=blog;host=localhost', 'root', 'root');

//pour voir les erreurs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//requete sql
//$count = $pdo->exec('INSERT INTO articles SET titre="mon titre", contenu="mon contenu", date="' . date('Y-m-d H:i:s') .'"');

//pour récuperer les articles
$resultat = $pdo->query('SELECT * FROM articles');
$datas = $resultat->fetchAll(PDO::FETCH_OBJ);
var_dump($datas);
?>