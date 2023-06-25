# Laravel conditionnal bulk update

This pachake add multi row update to Laravel Query Builder. It supports Laravel >= 9.

## Installation

You can install the package via composer:

```bash
composer require canedoc/laravel-bulk-update
```

## Usage

allow multi row update in one query.

In this example all rows in animes table that have :
    1- email = 'aruto@best.com' and name = 'naruto' the age will be set to 33.
    2- 'name' = 'sasuki' the email will be set to 'sasuki@best.com'
    3- all rows will set is_alive to true

```php
$data = [
    'age' => [
        ['email' => 'naruto@best.com', 'name' => 'naruto', 'age' => 33],
    ],
    'email' => ['email' => 'sasuki@best.com', 'name' => 'sasuki'],
    'is_alive' => true
]

\DB::table('animes')->where('is_active', true)->bulkUpdate($data);

Animes::where('is_active', true)->bulkUpdate($data);


```

## Testing

```bash
composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [BOUBRIT Nacim](https://github.com/canedoc)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
