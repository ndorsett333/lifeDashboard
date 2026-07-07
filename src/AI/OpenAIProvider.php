<?php

declare(strict_types=1);

namespace LifeOS\AI;

final class OpenAIProvider implements ProviderInterface
{
    public function getSlug(): string
    {
        return 'openai';
    }

    public function getLabel(): string
    {
        return 'OpenAI';
    }

    public function isConfigured(): bool
    {
        $apiKey = get_option('life_os_openai_api_key', '');

        return is_string($apiKey) && '' !== trim($apiKey);
    }

    public function complete(array $messages, array $options = []): array
    {
        unset($messages, $options);

        return [
            'provider' => $this->getSlug(),
            'content' => '',
            'error' => __('OpenAI provider is not implemented yet.', 'life-os'),
        ];
    }
}
