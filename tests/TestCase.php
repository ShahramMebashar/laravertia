<?php

namespace Tests;

use Tests\Laravertia\Menu\TestController;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app['router']->get('/test', ['as' => 'test', 'uses' => TestController::class.'@index']);
        // $this->app->make(Gate::class)->define('allowedPermission', fn ($user) => true);
        // $this->app->make(Gate::class)->define('deniedPermission', fn ($user) => false);
    }
}
