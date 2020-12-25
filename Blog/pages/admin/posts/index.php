<?php
$posts = App::getInstance()->getTable('Post')->all();
?>

<h1>Administation des articles</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->id; ?></td>
                <td><?= $post->titre; ?></td>
                <td>
                    <a class="btn btn-primary" href="p=?posts.edit&id=<?= $post->id; ?>">Editer</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>