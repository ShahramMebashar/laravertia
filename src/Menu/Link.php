<?php

namespace Laravertia\Menu;

class Link
{
    public function __construct(
        protected \Illuminate\Contracts\Routing\UrlGenerator|string|null $url = null,
    ) {}

    public static function to(string $path, array $parameters = [], bool $absolute = true): string
    {
        return (string) new self(
            url()->to($path, $parameters, $absolute)
        );
    }

    public static function action(string $action, array $parameters = [], bool $absolute = true): string
    {
        return (string) new self(
            url()->action($action, $parameters, $absolute)
        );
    }

    public static function route(string $name, array $parameters = [], bool $absolute = true): string
    {
        return (string) new self(
            url()->route($name, $parameters, $absolute)
        );
    }

    public function __toString(): string
    {
        return $this->url;
    }
}
