<?php

use Core\Html\BootstrapForm;

$form = new BootstrapForm($_POST);

?>

<form action="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>