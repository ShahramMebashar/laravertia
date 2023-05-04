<?php

namespace Laravertia\Menu;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Traits\Macroable;

class MenuItem implements Arrayable
{
    use Macroable;

    public function __construct(
        public readonly string $text,
        public readonly Link|string|null $url = null,
        public readonly string|null $icon = null,
        protected bool $isActive = false,
        public array $children = [],
        public bool $canView = true,
    ) {}

    public static function new(string $text, string|null $url = null, string|null $icon = null): self
    {
        return new self($text, $url, $icon);
    }

    public static function make(string $text, Link|string|null $url = null, string|null $icon = null): self
    {
        return static::new($text, $url, $icon);
    }

    public function add(self ...$childItem): self
    {
        $this->children = [...$this->children, ...$childItem];
        return $this;
    }

    public function toArray()
    {
        return [
            'text' => $this->text,
            'url' => $this->url,
            'icon' => $this->icon,
            'isActive' => $this->isActive,
            'children' => $this->getChildren(),
        ];
    }
    protected function getChildren(): array
    {
        return collect($this->children)
            ->map(fn ($child) => is_array($child->children) && count($child->children) ? $child->toArray() : $child)
            ->toArray();
    }

    public function viewIfCan(\Closure|bool|string $canView, array $arguments = []): self
    {
        if(is_string($canView)) {
            $canView = Gate::check($canView, $arguments);
        } 

        $this->canView = !is_callable($canView) ? $canView : $canView();
        return $this;
    }
}

