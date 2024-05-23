<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Jsonable;
use StdClass;

class PrettyJson extends Field
{
    protected string $view = 'filament-pretty-json::json';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJson $component, $state): void {
            $maybeTransformState = match (true) {
                is_array($state) || $state instanceof StdClass => json_encode($state),
                $state instanceof Jsonable => $state->toJson(),
                default => $state
            };

            $component->state($maybeTransformState);

        });
    }
}
