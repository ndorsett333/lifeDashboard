<?php

declare(strict_types=1);

namespace LifeOS\AI;

use InvalidArgumentException;

final class AIManager
{
    /**
     * @var array<string, ProviderInterface>
     */
    private array $providers = [];

    /**
     * @param array<int, ProviderInterface> $providers
     */
    public function __construct(array $providers)
    {
        foreach ($providers as $provider) {
            $this->providers[$provider->getSlug()] = $provider;
        }
    }

    public function provider(string $slug): ProviderInterface
    {
        if (! isset($this->providers[$slug])) {
            throw new InvalidArgumentException(sprintf('Unknown AI provider "%s".', $slug));
        }

        return $this->providers[$slug];
    }

    /**
     * @return array<string, string>
     */
    public function labels(): array
    {
        $labels = [];

        foreach ($this->providers as $slug => $provider) {
            $labels[$slug] = $provider->getLabel();
        }

        return $labels;
    }
}
