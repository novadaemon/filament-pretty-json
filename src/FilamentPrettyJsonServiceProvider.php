<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Support\Assets\Js;
use Filament\Support\Assets\Css;
use Spatie\LaravelPackageTools\Package;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPrettyJsonServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-pretty-json';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews(static::$name);
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'novadaemon/filament-pretty-json';
    }

    /**
     * @return array<\Filament\Support\Assets\Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('styles', __DIR__ . '/../resources/css/app.css'),
            Js::make('scripts', __DIR__ . '/../resources/js/app.js'),
        ];
    }
}
