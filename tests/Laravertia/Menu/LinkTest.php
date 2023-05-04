<?php

use Laravertia\Menu\Link;
use Tests\Laravertia\Menu\TestController;

test('can generate a url from path', function () {
    $link = Link::to('/');
    expect($link)->toBe(config('app.url'));
});

test('can generate a url from an action', function () {
    $link = Link::action(TestController::class . '@index');
    expect($link)->toBe(config('app.url') . '/test');
});