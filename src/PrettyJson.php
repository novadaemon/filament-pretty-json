<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Forms\Components\Field;

class PrettyJson extends Field
{
    protected string $view = 'filament-pretty-json::json';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJson $component, $state): void {

            if (is_string($state)) {
                $state = json_decode($state, true);
            }
            $component->state((array) $state);
        });
    }
}
