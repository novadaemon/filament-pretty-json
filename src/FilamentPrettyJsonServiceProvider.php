<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentPrettyJsonServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-pretty-json' => __DIR__.'/../resources/css/app.css',
    ];

    protected array $scripts = [
        'filament-pretty-json' => __DIR__.'/../resources/js/app.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-pretty-json')
            ->hasViews();
    }
}
