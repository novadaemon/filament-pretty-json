<?php

namespace Novadaemon\FilamentPrettyJson\Infolist;

use StdClass;
use Filament\Infolists\Components\ViewEntry;
use Illuminate\Contracts\Support\Jsonable;
use Novadaemon\FilamentPrettyJson\Trait\Copyable;

class PrettyJsonEntry extends ViewEntry
{
    use Copyable;

    protected string $view = 'filament-pretty-json::infolist.json';

    public function getState(): mixed
    {
        $state = parent::getState();

        if ($state === 'null') {
            return null;
        }

        if ($state instanceof Jsonable) {
            return $state->toJson();
        }

        if (is_array($state) || $state instanceof StdClass) {
            return json_encode($state);
        }

        return $state;
    }
}
