<?php

namespace Novadaemon\FilamentPrettyJson\Form;

use Closure;
use StdClass;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Jsonable;
use Novadaemon\FilamentPrettyJson\Trait\Copyable;

class PrettyJsonField extends Field
{
    use Copyable;

    protected bool | Closure $isDisabled = true;

    protected string $view = 'filament-pretty-json::form.json';

    protected bool | Closure $isDehydrated = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJsonField $component, $state): void {

            if ($state instanceof Jsonable) {
                $state = $state->toJson();
            }

            if (is_array($state) || $state instanceof StdClass) {
                $state = json_encode($state);
            }

            if ($state === null || $state === '[]') {
                $state = 'null';
            }

            $component->state($state);
        });

    }
}
