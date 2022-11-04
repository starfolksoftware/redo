# Laravel Redo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/starfolksoftware/redo.svg?style=flat-square)](https://packagist.org/packages/starfolksoftware/redo)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/starfolksoftware/redo/run-tests?label=tests)](https://github.com/starfolksoftware/redo/actions?query=workflow%3Arun-tests+task%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/starfolksoftware/redo/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/starfolksoftware/redo/actions?query=workflow%3A"Fix+PHP+code+style+issues"+task%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/starfolksoftware/redo.svg?style=flat-square)](https://packagist.org/packages/starfolksoftware/redo)

Make calendar events recurrable in your Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require starfolksoftware/redo
```

To install the package, run the following command:

```bash
php artisan redo:install
```

## Configurations

To disable migrations, add the following in the service provider:

```php
Redo::ignoreMigrations();
```

To use a different `Recurrence` model:

```php
Redo::useRecurrenceModel('App\\Models\\CoolRecurrenceModel');
```

To specify the timezone Redo should use:

```php
Redo::useTimezone('Continent/Country');
```

To specify the recurrences table name,

```php
Redo::useRecurrencesTableName('new_table_name');
```

To turn on support for soft deletiong,

```php
Redo::supportsSoftDeletes();
```

To turn on support for teams

```php
Redo::supportsTeams();
```

## Usage

To make a model recur, add the `Recurs` trait as in the following:

```php
use StarfolkSoftware\Redo\Recurs;

class Task extends Model
{
    // ...
    use Recurs;
    // ...
}
```

To create a recurrence on a recur model,

```php
$task->makeRecurrable(string $frequency, int $interval, \DateTime $startsAt, $ends = null)
```

To update a model's recurrence,

```php
$task->updateRecurrence(string $frequency, int $interval, \DateTime $startsAt, $ends = null)
```

To pause a model's recurrence,

```php
$task->pauseRecurrence(bool $value = true)
```

To check if a model's recurrence is active,

```php
$task->recurrenceIsActive()
```

To return `recurrences` of a model,

```php
$task->recurrences(): \Recurr\RecurrenceCollection|\Recurr\Recurrence[]

// other useful methods
$task->currentRecurrence()
$task->nextRecurrence()
$task->firstRecurrence()
$task->lastRecurrence()
```

To setup the team support, add the `TeamHasRecurrences` trait to the team model,

```php
use StarfolkSoftware\Redo\TeamHasRecurrences;

class Team extends Model
{
    use TeamHasRecurrences;

    protected $table = 'teams';
}
```

To create a recurrence for a team,

```php
$team->recurrences()->save([
    //...
]);
```

To fetch recurrences of a team,

```php
$team->recurrences
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please recurrence [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Faruk Nasir](https://github.com/frknasir)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
