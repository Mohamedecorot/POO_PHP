<?php

use Event\Emitter;
use Kahlan\Plugin\Double;

describe(Emitter::class, function () {

    beforeEach(function () {
        $reflection = new ReflectionClass(Emitter::class);
        $instance = $reflection->getProperty('_instance');
        $instance->setAccessible(true);
        $instance->setValue(null, null);
        $instance->setAccessible(false);
    });

    given('emitter', function () { return Emitter::getInstance(); });

    it('should be a singleton', function () {
        $instance = Emitter::getInstance();
        expect($instance)->toBeAnInstanceOf(Emitter::class);
        expect($instance)->toBe(Emitter::getInstance());
    });

});

describe('::on', function () {

    it('should trigger the listened event', function () {
        $this->emitter = Emitter::getInstance();
        $listener = Double::instance();
        $comment = ['name' => 'John'];

        expect($listener)->toReceive('onNewComment')->times(3)->with($comment);

        $this->emitter->on('Comment.created', [$listener, 'onNewComment']);
        $this->emitter->emit('Comment.created', $comment);
        $this->emitter->emit('Comment.created', $comment);
        $this->emitter->emit('Comment.created', $comment);
    });

    it('should trigger events in the right order', function () {
        $listener = Double::instance();

        expect($listener)->toReceive('onNewComment2')->once()->ordered;
        expect($listener)->toReceive('onNewComment')->once()->ordered;

        $this->emitter->on('Comment.created', [$listener, 'onNewComment'], 1);
        $this->emitter->on('Comment.created', [$listener, 'onNewComment2'], 200);
        $this->emitter->emit('Comment.created');
    });
});