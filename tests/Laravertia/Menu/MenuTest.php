<?php

use Laravertia\Menu\MenuItem;
use Laravertia\Menu\Menu;

test('it starts with an empty array', function () {
    $menu = Menu::new();
    expect($menu->toArray())
        ->toBeArray()
        ->toBe([]);
});

test('can be converted to json', function () {
    $menu = Menu::new();
    expect($menu->toJson())
        ->toBeString()
        ->toBe('{}');
});

test('can add an item', function () {
    $menu = Menu::new();
    $menu->add(MenuItem::make('Home', '/'));
    expect($menu->toArray())->toHaveCount(1);
});


test('can add multiple items', function () {
    $menu = Menu::new();
    $menu->add(
        MenuItem::make('Home', '/'),
        MenuItem::make('About', '/about'),
    );
    expect($menu->toArray())->toHaveCount(2);
});

test('can render with nested menus', function () {
    $menu = Menu::new();
    $menu->add(
        MenuItem::make('Home', '/'),
        MenuItem::make('About', '/about')->add(
            MenuItem::make('Team', '/about/team'),
            MenuItem::make('Company', '/about/company'),
        ),
    );
    expect(json_decode($menu->toJson(), true))->toBeArray();
});

test('it only renders allowed items', function () {
    $menu = Menu::new();
    $menu->add(
        MenuItem::make('Home', '/')->viewIfCan(fn() => false),
        MenuItem::make('About', '/about')->add(
            MenuItem::make('Team', '/about/team'),
            MenuItem::make('Company', '/about/company'),
        ),
    );
    expect($menu->toArray())->toHaveCount(1);
});