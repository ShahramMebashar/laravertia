<?php

namespace Laravertia\Menu;

class MenuBuilder
{
    public static function build(string $section = 'default'): array
    {
        $menus = require app_path('../src/menu/config/menu.php');

        return collect($menus)
            ->map(function ($menuItems, $name) {
                return Menu::make($name, fn ($menu) => $menu->add(...$menuItems));
            })
            ->firstWhere(fn($menu, $sectionName) => $sectionName == $section)
            ->toArray();
    }
}
