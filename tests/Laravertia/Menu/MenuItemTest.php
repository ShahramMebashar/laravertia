<?php

use Illuminate\Contracts\Auth\Access\Gate;
use Laravertia\Menu\Link;
use Laravertia\Menu\MenuItem;

test('contains a text', function () {
    $item = MenuItem::make('Home');
    expect($item->text)->toBe('Home');
});

test('contains an icon', function () {
    $item = MenuItem::make('Home', '/', 'homeIcon');
    expect($item->icon)->toBe('homeIcon');
});

test('contains a url path', function () {
    $item = MenuItem::make('Home', '/');
    expect($item->url)->toBe('/');
});

test('can use a full url', function () {
    $item = MenuItem::make('Laravel', 'https://laravel.com');
    expect($item->text)->toBe('Laravel');
    expect($item->url)->toBe('https://laravel.com');
});

test('can use link', function () {
    $item = MenuItem::make('Laravel', Link::to('https://laravel.com'));
    expect($item->url)->toBe('https://laravel.com');
});

test('link can be null', function () {
    $item = MenuItem::make('Empty link');
    expect($item->url)->toBeNull();
});

test('can have nested items', function () {
    $item = MenuItem::make('Parent', Link::to('https://laravel.com'));
    $item->add(MenuItem::make('Child 1', '/'));
    $item->add(MenuItem::make('Child 2', '/'));
    expect($item->children)->toHaveCount(2);
});

test('can define view permission with a closure', function () {
    $home = MenuItem::make('Home', Link::to('/'))->viewIfCan(fn () => true);
    expect($home->canView)->toBeTrue();

    $testMenu = MenuItem::make('Home', Link::to('/'))->viewIfCan(fn () => false);
    expect($testMenu->canView)->toBeFalse();
});