<?php

namespace App\DataTransferObjects;

use App\Models\User;
use Spatie\LaravelData\Data;


class SharedData extends Data
{
    public function __construct(
        public ?UserData $user = null,
    ) {}
}