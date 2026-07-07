<?php

declare(strict_types=1);

namespace LifeOS\AI;

interface ProviderInterface
{
    public function getSlug(): string;

    public function getLabel(): string;

    public function isConfigured(): bool;

    /**
     * @param array<int, array<string, string>> $messages
     * @param array<string, mixed>              $options
     *
     * @return array<string, mixed>
     */
    public function complete(array $messages, array $options = []): array;
}
