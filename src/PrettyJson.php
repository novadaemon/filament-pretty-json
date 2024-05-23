<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use StdClass;

class PrettyJson extends Field
{
    protected string $view = 'filament-pretty-json::json';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJson $component, $state): void {
            $maybeTransformState = match (true) {
                is_string($state) => json_decode($state),
                $state instanceof Jsonable => json_decode($state->toJson(), true),
                $state instanceof AsArrayObject => $state->toArray(),
                default => (array) $state
            };

            $component->state($maybeTransformState);

        });
    }
}
