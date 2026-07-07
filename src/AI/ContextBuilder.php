<?php

declare(strict_types=1);

namespace LifeOS\AI;

final class ContextBuilder
{
    /**
     * @return array<string, mixed>
     */
    public function build(int $userId): array
    {
        return [
            'user_id' => $userId,
            'generated_at' => gmdate('c'),
        ];
    }
}
