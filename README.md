# machine-identifier
This is a simple class for identifying machines, creating a unique ID based on 
hardware (Hard disk UUID) 


## Install

Via Composer

``` bash
$ composer require floor9design/machine-identifier
```

Note, the composer file should be available in PSR4 compliant packages, such as Laravel, by default. 

## Usage

Instantiate the class as required.

```php
$machine_identifier = new \Floor9design\MachineIdentifier\MachineIdentifier();
```

*or*
```php
Use \Floor9design\MachineIdentifier\MachineIdentifier;
```
and
```php
$machine_identifier = new MachineIdentifier();
```

Generate a unique ID as follows:

```php
$id = $machine_identifier->uniqueMachineId();
```

Optionally a salt can be used to add further uniqueness:

```php
$id = $machine_identifier->uniqueMachineId($salt);
```

## Change log

Please see [CHANGELOG](docs/CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

Testing is currently under development.

## Contributing

Please see [CONTRIBUTING](docs/CONTRIBUTING.md) and [CODE_OF_CONDUCT](docs/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email rick@floor9design.com instead of using the issue tracker.

## Credits

- [Rick Morice][link-author]

## License

The MIT License (MIT). Please see [License File](docs/LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/floor9design/machine-identifier.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/floor9design/machine-identifier/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/floor9design/machine-identifier.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/floor9design/machine-identifier.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/floor9design/machine-identifier.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/floor9design/machine-identifier
[link-travis]: https://travis-ci.org/floor9design/machine-identifier
[link-scrutinizer]: https://scrutinizer-ci.com/g/floor9design/machine-identifier/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/floor9design/machine-identifier
[link-downloads]: https://packagist.org/packages/floor9design/machine-identifier
[link-author]: https://github.com/elb98rm