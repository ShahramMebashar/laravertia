<?php

namespace App\Http\Middleware;

use App\DataTransferObjects\MenuData;
use App\DataTransferObjects\SharedData;
use App\DataTransferObjects\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Laravertia\Menu\Menu;
use Laravertia\Menu\MenuItem;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $state = new SharedData(
            user: Auth::check() ? UserData::from(Auth::user()) : null,
            menu: Menu::make('default', function ($menu) {
                $menu->add(
                    MenuItem::make('Dashboard', '/dashboard', 'HomeIcon')->viewIfCan('viewDashboard'),
                    MenuItem::make('Dashboard 2', '/dashboard', 'HomeIcon'),
                    MenuItem::make('About')->add(
                        MenuItem::make('Child 1', 'asdasd'),
                        MenuItem::make('Child 2', 'asdsad'),
                    )
                    );
            }
            )->toArray(),
        );


        return array_merge(
            parent::share($request),
            $state->toArray(),
        );
    }
}
