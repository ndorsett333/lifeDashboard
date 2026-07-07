<?php

declare(strict_types=1);

namespace LifeOS\Lifecycle;

use LifeOS\Frontend\Frontend;

final class Activator
{
    public static function activate(): void
    {
        update_option('life_os_version', LIFE_OS_VERSION);

        $frontend = new Frontend();
        $frontend->registerRewriteRules();
        flush_rewrite_rules();
    }
}
