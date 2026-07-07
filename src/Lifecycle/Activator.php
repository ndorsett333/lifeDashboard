<?php

declare(strict_types=1);

namespace LifeOS\Lifecycle;

final class Activator
{
    public static function activate(): void
    {
        update_option('life_os_version', LIFE_OS_VERSION);
    }
}
