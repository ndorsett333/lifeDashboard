<?php

declare(strict_types=1);

namespace LifeOS\Helpers;

final class Sanitizer
{
    public static function text(string $value): string
    {
        return sanitize_text_field(wp_unslash($value));
    }

    public static function key(string $value): string
    {
        return sanitize_key(wp_unslash($value));
    }

    public static function textarea(string $value): string
    {
        return sanitize_textarea_field(wp_unslash($value));
    }

    /**
     * @param array<int, string> $values
     *
     * @return array<int, string>
     */
    public static function textArray(array $values): array
    {
        return array_map([self::class, 'text'], $values);
    }
}
