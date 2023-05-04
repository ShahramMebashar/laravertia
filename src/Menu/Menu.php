<?php

namespace Laravertia\Menu;

use Illuminate\Contracts\Support\Arrayable;

class Menu implements Arrayable
{
    /**
     * Array of items
     *
     * @param array<Item> $items
     */
    public function __construct(
        protected array $items,
        protected string $section = 'default',
    ) {
    }

    public static function new(MenuItem ...$menuItem): self
    {
        return new static(
            items: [...$menuItem],
        );
    }
    public static function make(string $section, \Closure|MenuItem ...$menuItem): self
    {
        if (count($menuItem) && $menuItem[0] instanceof \Closure) {
            $self = $self = new static([], $section);
            $menuItem[0]($self);
            return $self;
        }

        return static::new(...$menuItem);
    }

    public function add(MenuItem ...$item): self
    {
        $this->items = [...$this->items, ...$item];
        return $this;
    }

    public function toArray(): array
    {
        return $this->getItems();
    }

    public function toJson(): string
    {
        return json_encode($this->items, JSON_FORCE_OBJECT);
    }

    public function getItems(): array
    {
        return collect($this->items)
            ->reject(fn ($item) => !$item->canView)
            ->toArray();
    }

    public function setSection(string $section): self
    {
        $this->section = $section;
        return $this;
    }
}
