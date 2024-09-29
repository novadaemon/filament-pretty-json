# novadaemon/filament-pretty-json

Read-only field to show pretty json in your [filamentphp](https://filamentphp.com/) forms.

![Screenshot](https://raw.githubusercontent.com/novadaemon/filament-pretty-json/refs/heads/main/resources/img/screenshot.webp)

## Installation

You can install the package via composer:

```bash
composer require novadaemon/filament-pretty-json
```

This package supports Filament 2.x and 3.x.

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

The value of the field can be casting to string, json, array, object, AsArrayObject or object that implements Jsonable interface

```php
/**
 * @var string[]
 */
protected $casts = [
    'card_info' => 'string',
    // OR 'card_info' => 'json',
    // OR 'card_info' => 'array',
    // OR 'card_info' => 'object',
    // OR 'card_info' => AsArrayObject::class,
    // OR 'card_info' => CustomCast::class,
];
```

## Allowing the value to be copied to the clipboard

You may make the JSON copyable, such that clicking on the icon that appear in the top of the div when this option is enabled, the JSON value to the clipboard, and optionally specify a custom confirmation message and duration in milliseconds.

```php
PrettyJson::make('card_info')
    ->copyable()
    ->copyMessage('Your JSON is copied to the clipboard')
    ->copyMessageDuration(1500)
```

![Copyable](https://raw.githubusercontent.com/novadaemon/filament-pretty-json/refs/heads/main/resources/img/copyable.webp)

## Customize

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-pretty-json-views"
```

Also, you can overwrite the css rules in your stylesheets.

```css
pre.prettyjson {
    color: black;
    background-color: rgba(0, 0, 0, 0);
    border: 1px solid rgb(229, 231, 235);
    border-radius: 0.5rem;
    padding: 10px 20px;
    overflow: auto;
    font-size: 12px;
}

:is(.dark) pre.prettyjson {
    opacity: .7;
    --tw-bg-opacity: 1;
    --tw-border-opacity: 1;
    border: 1px solid rgb(75 85 99/var(--tw-border-opacity));
    color: rgb(209 213 219/var(--tw-text-opacity));
}

:is(.dark) pre.prettyjson span.json-key {
    color: red !important;
}

:is(.dark) pre.prettyjson span.json-string {
    color: aquamarine !important;
}

:is(.dark) pre.prettyjson span.json-value {
    color: deepskyblue !important;
}

.copy-button {
    position: absolute;
    right: 5px;
    top: 5px;
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    cursor: pointer;
    color: rgb(156 163 175);
    border: none;
    outline: none;
}

.copy-button:hover {
    color: rgb(75 85 99);
}

.copy-button:active, .copy-button:focus {
    border: none;
    outline: none;
}

```

## Contributing

Contributing is pretty chill and is highly appreciated! Just send a PR and/or create an issue!

## Credits

- [All contributors](https://github.com/novadaemon/filament-pretty-json/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

