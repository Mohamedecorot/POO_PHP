<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
    ]);
}
$post = $postTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>