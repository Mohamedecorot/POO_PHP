<?php
require 'vendor/autoload.php';
$emitter = \Event\Emitter::getInstance();

$emitter->on('Comment.created', function ($firstname, $lastname) {
    echo $firstname . ' ' . $lastname . ' a posté un commentaire';
}, 1);

$emitter->on('Comment.created', function ($firstname, $lastname) {
    echo $firstname . ' ' . $lastname . ' a posté un commentaire';
}, 100);

$emitter->emit('Comment.created', 'John', 'Doe');

// $emitter->emit('User.new', $user);
// $emitter->on('User.new', function ($user) {
//     mail(...);
// });

// $emitter->on('User.new', function ($user) {
//     mail(...);
// });