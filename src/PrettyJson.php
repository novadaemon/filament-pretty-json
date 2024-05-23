<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Jsonable;

class PrettyJson extends Field
{
    protected string $view = 'filament-pretty-json::json';

    protected function setUp(): void
    {
        parent::setUp();

        if(is_array($state)) {
            $state = json_encode($state);
        }

        if ($state instanceof Jsonable) {
            $state = $state->toJson();
        }

        $component->state($state);
    }
}
