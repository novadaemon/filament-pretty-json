<?php 

namespace Novadaemon\FilamentPrettyJson;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentPrettyJsonServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-pretty-json-styles' => __DIR__ . '/../dist/app.css',
    ];

    protected array $scripts = [
        'filament-pretty-json-scripts' => __DIR__ . '/../dist/app.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-pretty-json')
            ->hasViews();
    }
}