# novadaemon/filament-pretty-json

Read-only field to show pretty json in your [filamentphp](https://filamentphp.com/) forms.

## Installation

You can install the package via composer:

```bash
composer require novadaemon/filament-pretty-json
```

This package supports Laravel 9 and Laravel 10.

## Usage

Simply use the component as you'd use any other Filament field. It's especially perfect for the resource view page where it blends right in.

```php
use Novadaemon\FilamentPrettyJson\PrettyJson;

class FileResource extends Resource
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                PrettyJson::make('json')
            ]);
    }
}
```