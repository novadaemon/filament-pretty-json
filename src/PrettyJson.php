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

            if(is_array($state)) {
                $state = json_encode($state);
            }
            $component->state((array) $state);

        });
    }
}
