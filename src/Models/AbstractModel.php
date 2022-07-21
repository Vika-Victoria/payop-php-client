<?php
declare(strict_types=1);

namespace PayopClient\Models;

class AbstractModel implements ArrayableInterface
{
    protected array $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public static function createFromAttributes(array $attributes = []): static
    {
        return new static($attributes);
    }
}
