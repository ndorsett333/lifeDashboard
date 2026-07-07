<?php

declare(strict_types=1);

namespace LifeOS\AI;

final class OllamaProvider implements ProviderInterface
{
    public function getSlug(): string
    {
        return 'ollama';
    }

    public function getLabel(): string
    {
        return 'Ollama';
    }

    public function isConfigured(): bool
    {
        $endpoint = get_option('life_os_ollama_endpoint', 'http://127.0.0.1:11434');

        return is_string($endpoint) && '' !== trim($endpoint);
    }

    public function complete(array $messages, array $options = []): array
    {
        unset($messages, $options);

        return [
            'provider' => $this->getSlug(),
            'content' => '',
            'error' => __('Ollama provider is not implemented yet.', 'life-os'),
        ];
    }
}
