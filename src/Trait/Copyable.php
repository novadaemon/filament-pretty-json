<?php

namespace Novadaemon\FilamentPrettyJson\Trait;

use Filament\Support\Concerns\CanBeCopied;

trait Copyable
{
    use CanBeCopied;

    public function getCopyableState(): ?string
    {
        $state = $this->getState();

        return $state == 'null' ? null : $state;
    }
}
