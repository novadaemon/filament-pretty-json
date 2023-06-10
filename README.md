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

The value of the field can be an array or a json string

```php
/**
 * @var string[]
 */
protected $casts = [
    'json' => 'array',
];

```

## Customize

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-pretty-json-views"
```

Also, yo can overwrite the css rules in your stylesheets.

```css
pre.prettyjson {
    background-color: ghostwhite;
    border: 1px solid silver;
    padding: 10px 20px;
    border-radius: 4px;
    overflow: auto;
}
```

## Contributing

Contributing is pretty chill and is highly appreciated! Just send a PR and/or create an issue!

## Credits

- [Jesús García](https://github.com/novadaemon)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Screenshot
![Screeshot](screenshot.png)