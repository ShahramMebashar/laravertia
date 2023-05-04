<?php

use Laravertia\Menu\MenuItem;


return [

    /*
    |--------------------------------------------------------------------------
    | Menu Sections
    |--------------------------------------------------------------------------
    |
    | Here the key is the name of the section and the value is an array of
    | menu items. You can add as many sections as you want.
    |
    */
    'default' => [
        MenuItem::make('Dashboard', '/dashboard', 'HomeIcon'),
        MenuItem::make('Projects', '/projects', 'HomeIcon'),
        MenuItem::make('About', null, 'HomeIcon')->add(
            MenuItem::make('Child 1', 'asdasd'),
            MenuItem::make('Child 2', 'asdsad'),
        ),
        MenuItem::make('Tasks', null, 'HomeIcon')->add(
            MenuItem::make('All tesks', '/tasks'),
            MenuItem::make('Pending taks', '/tasks/pending'),
            MenuItem::make('Completed taks', '/tasks/completed'),
        ),
        MenuItem::make('Teams', '/teams', 'HomeIcon')
    ],

    'bottom' => [
        MenuItem::make('Settings', '/settings', 'HomeIcon'),
    ],
];
