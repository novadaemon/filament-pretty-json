<?php

namespace Novadaemon\FilamentPrettyJson;

use Closure;
use StdClass;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\CanBeCopied;
use Illuminate\Contracts\Support\Jsonable;

class PrettyJson extends Field
{
    use CanBeCopied;

    protected bool | Closure $isDisabled = true;

    protected string $view = 'filament-pretty-json::json';

    protected bool | Closure $isDehydrated = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(static function (PrettyJson $component, $state): void {

            if ($state instanceof Jsonable) {
                $state = $state->toJson();
            }

            if (is_array($state) || $state instanceof StdClass) {
                $state = json_encode($state);
            }

            $component->state($state);
        });

    }

    public function getCopyableState(): string
    {
        return $this->getState();
    }
}
