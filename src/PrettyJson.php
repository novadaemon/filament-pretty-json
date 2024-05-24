<?php

namespace Novadaemon\FilamentPrettyJson;

use Filament\Forms\Components\Field;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use PhpParser\Node\Expr\Instanceof_;
use StdClass;

class PrettyJson extends Field
{
    protected string $view = 'filament-pretty-json::json';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJson $component, $state): void {

            if(is_array($state) || $state instanceof StdClass) {
                $state = json_encode($state);
            }

            if ($state instanceof Jsonable) {
                $state = $state->toJson();
            }

            $component->state($state);

        });
    }
}
