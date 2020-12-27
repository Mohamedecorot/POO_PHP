<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
    ]);
    if($result) {
        ?>
        <div class="alert alert-success">L'article a bien été modifié</div>
        <?php
    }
}
$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->all();
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('titre', 'Titre de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>