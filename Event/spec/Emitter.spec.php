<?php

use Event\Emitter;
use Kahlan\Plugin\Double;

describe(Emitter::class, function () {

    it('should be a singleton', function () {
        $instance = Emitter::getInstance();
        expect($instance)->toBeAnInstanceOf(Emitter::class);
        expect($instance)->toBe(Emitter::getInstance());
    });

});

describe('::on', function () {

    it('should trigger the listened event', function () {
        $emitter = Emitter::getInstance();
        $listener = Double::instance();
        $comment = ['name' => 'John'];

        expect($listener)->toReceive('onNewComment')->times(3)->with($comment);

        $emitter->on('Comment.created', [$listener, 'onNewComment']);
        $emitter->emit('Comment.created', $comment);
        $emitter->emit('Comment.created', $comment);
        $emitter->emit('Comment.created', $comment);
    });

});