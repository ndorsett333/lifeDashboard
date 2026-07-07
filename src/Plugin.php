<?php

declare(strict_types=1);

namespace LifeOS;

use LifeOS\Admin\Admin;
use LifeOS\AI\AIManager;
use LifeOS\AI\ContextBuilder;
use LifeOS\AI\OllamaProvider;
use LifeOS\AI\OpenAIProvider;
use LifeOS\AI\PromptBuilder;
use LifeOS\CPT\Registrar as CPTRegistrar;
use LifeOS\Frontend\Frontend;
use LifeOS\REST\Routes;
use LifeOS\Services\Assets;
use LifeOS\Services\I18n;
use LifeOS\Services\ModuleRegistry;

final class Plugin
{
    private bool $booted = false;

    public function __construct(private readonly Container $container)
    {
    }

    public function boot(): void
    {
        if ($this->booted) {
            return;
        }

        $this->registerServices();

        $this->container->get(I18n::class)->register();
        $this->container->get(Assets::class)->register();
        $this->container->get(Admin::class)->register();
        $this->container->get(Frontend::class)->register();
        $this->container->get(Routes::class)->register();
        $this->container->get(CPTRegistrar::class)->register();
        $this->container->get(ModuleRegistry::class)->register();

        $this->booted = true;
    }

    private function registerServices(): void
    {
        $this->container->singleton(I18n::class, static fn (): I18n => new I18n());
        $this->container->singleton(Assets::class, static fn (): Assets => new Assets());
        $this->container->singleton(Admin::class, static fn (): Admin => new Admin());
        $this->container->singleton(Frontend::class, static fn (): Frontend => new Frontend());
        $this->container->singleton(Routes::class, static fn (): Routes => new Routes());
        $this->container->singleton(CPTRegistrar::class, static fn (): CPTRegistrar => new CPTRegistrar());
        $this->container->singleton(ModuleRegistry::class, static fn (): ModuleRegistry => new ModuleRegistry());

        $this->container->singleton(PromptBuilder::class, static fn (): PromptBuilder => new PromptBuilder());
        $this->container->singleton(ContextBuilder::class, static fn (): ContextBuilder => new ContextBuilder());

        $this->container->singleton(OpenAIProvider::class, static fn (): OpenAIProvider => new OpenAIProvider());
        $this->container->singleton(OllamaProvider::class, static fn (): OllamaProvider => new OllamaProvider());

        $this->container->singleton(
            AIManager::class,
            fn (Container $container): AIManager => new AIManager([
                $container->get(OpenAIProvider::class),
                $container->get(OllamaProvider::class),
            ])
        );
    }
}
