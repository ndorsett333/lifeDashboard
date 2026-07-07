<?php

declare(strict_types=1);

namespace LifeOS\Services;

final class ModuleRegistry
{
    /**
     * @var array<string, string>
     */
    private array $modules = [
        'dashboard' => 'Dashboard',
        'goals' => 'Goals',
        'habits' => 'Habits',
        'learning' => 'Learning',
        'projects' => 'Projects',
        'journal' => 'Journal',
        'family-activities' => 'Family Activities',
        'books' => 'Books',
        'health' => 'Health',
        'ai-coach' => 'AI Coach',
        'settings' => 'Settings',
    ];

    public function register(): void
    {
        // Placeholder for module registration orchestration.
    }

    /**
     * @return array<string, string>
     */
    public function all(): array
    {
        return $this->modules;
    }
}
