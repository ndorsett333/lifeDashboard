<?php

declare(strict_types=1);

namespace LifeOS;

use InvalidArgumentException;

final class Container
{
    /**
     * @var array<string, callable(self):mixed>
     */
    private array $bindings = [];

    /**
     * @var array<string, object>
     */
    private array $instances = [];

    public function bind(string $id, callable $resolver): void
    {
        $this->bindings[$id] = $resolver;
    }

    public function singleton(string $id, callable $resolver): void
    {
        $this->bindings[$id] = function (self $container) use ($id, $resolver): mixed {
            if (! isset($this->instances[$id])) {
                $resolved = $resolver($container);

                if (! is_object($resolved)) {
                    throw new InvalidArgumentException('Singleton bindings must resolve to an object.');
                }

                $this->instances[$id] = $resolved;
            }

            return $this->instances[$id];
        };
    }

    public function has(string $id): bool
    {
        return isset($this->bindings[$id]) || isset($this->instances[$id]);
    }

    public function get(string $id): mixed
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (! isset($this->bindings[$id])) {
            throw new InvalidArgumentException(sprintf('No binding found for "%s".', $id));
        }

        return ($this->bindings[$id])($this);
    }
}
