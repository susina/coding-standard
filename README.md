# Susina Coding Standard

coding-standard library is a set of [php-cs-fixer](https://cs.sensiolabs.com) rules, based on PSR1 and PSR2, and inspired
on [phootwork/php-cs-fixer-config](https://github.com/phootwork/php-cs-fixer-config).

## Installation

Run

```
$ composer require --dev susina/coding-standard
```

## Configuration

Create a configuration file `.php_cs.dist` in the root of your project:

```php
<?php declare(strict_types=1);

$config = new Susina\CodingStandard\Config();
$config->getFinder()
    ->exclude(['fixture'])
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

// You can remove the following line if you don't run php-cs-fixer on Travis-ci
$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

## Composer

Add the following to your compose.json:

```json
	"scripts": {
		"cs": "php-cs-fixer fix -v --diff --dry-run",
		"cs-fix": "php-cs-fixer fix -v --diff"
	}
```

Now you can check your code style by running:

```
composer cs
```
and you can fix it by:

```
composer cs-fix
```

### Git

We suggest to add `.php_cs.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:

```
vendor/
.php_cs.cache
```

### Travis

You can configure Travis to cache the `php_cs.cache` file. Update your `.travis.yml`:

```yml
cache:
  directories:
    - $HOME/.php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
script:
  - composer cs
```

## Fixing issues

If you need to fix issues locally, just run

```
$ composer cs-fix
```
 
## License

This package is licensed under the [Apache2 License](http://www.apache.org/licenses/LICENSE-2.0).
For full copyright informations, please see LICENSE file,in this repository.