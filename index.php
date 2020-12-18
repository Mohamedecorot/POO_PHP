<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php

use Tutoriel\Autoloader;
use Tutoriel\BootstrapForm;
require 'class/Autoloader.php';
Autoloader::register();

$form = new BootstrapForm($_POST);
//var_dump(Text::publicwithZero(4));
?>

<div class="container">
    <form action="#" method="post">
        <?php
            echo $form->input('username');
            echo $form->input('password');
            echo $form->submit();
            ?>
    </form>
</div>

</body>
</html>