<?php

namespace App\DataTransferObjects;

use App\Models\User;
use Spatie\LaravelData\Data;

class SharedData extends Data
{
    public function __construct(
        public readonly ?UserData $user = null,
        /**
         * Undocumented variable
         *
         * @var array<\Laravertia\Menu\MenuItem>
         */
        public readonly array $menu = [],
    ) {}
}