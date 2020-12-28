<?php
$table = App::getInstance()->getTable('Category');
if(!empty($_POST)) {
    $result = $table->delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
}