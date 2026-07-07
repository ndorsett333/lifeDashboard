<?php

declare(strict_types=1);

namespace LifeOS\Repositories;

use wpdb;

abstract class BaseRepository
{
    public function __construct(protected readonly wpdb $db)
    {
    }
}
