<?php

declare(strict_types=1);

namespace LifeOS\Lifecycle;

final class Deactivator
{
    public static function deactivate(): void
    {
        // Keep data on deactivation. Cleanup is handled in uninstall.php.
    }
}
