<?php

declare(strict_types=1);

namespace LifeOS\Models;

abstract class BaseModel
{
    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(protected array $attributes = [])
    {
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->attributes;
    }
}
