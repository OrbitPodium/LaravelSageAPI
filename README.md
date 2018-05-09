# LaravelSageAPI

## Install

Via Composer

``` bash
$ composer require orbitpodium/laravelsageapi
```

Add 'SAGE_WSD' environment var to yout laravel .env file pointing to your wsdl file.

Example:
``` bash
SAGE_WSDL=http://myurl.com/sage.svc?singleWsdl
```
## Usage

``` php
use Orbitpodium\LaravelSageAPI\Sage;

$sage=new Sage();
dd($sage);
```

## Security

If you discover any security related issues, please email info@creativeweb.pt instead of using the issue tracker.

## Credits

- [CreativeWeb][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Orbitpodium/LaravelSageAPI.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Orbitpodium/LaravelSageAPI/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Orbitpodium/LaravelSageAPI.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Orbitpodium/LaravelSageAPI.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Orbitpodium/LaravelSageAPI.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Orbitpodium/LaravelSageAPI
[link-travis]: https://travis-ci.org/Orbitpodium/LaravelSageAPI
[link-scrutinizer]: https://scrutinizer-ci.com/g/Orbitpodium/LaravelSageAPI/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Orbitpodium/LaravelSageAPI
[link-downloads]: https://packagist.org/packages/Orbitpodium/LaravelSageAPI
[link-author]: https://github.com/orbitpodium
[link-contributors]: ../../contributors
