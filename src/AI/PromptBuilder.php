<?php

declare(strict_types=1);

namespace LifeOS\AI;

final class PromptBuilder
{
    /**
     * @param array<string, mixed> $context
     */
    public function buildSystemPrompt(array $context = []): string
    {
        unset($context);

        return __('You are the Life OS coach. Help the user decide the best next action.', 'life-os');
    }
}
