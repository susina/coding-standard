# Susina Coding Standard

![](https://github.com/susina/coding-standard/workflows/Test%20Suite/badge.svg)
[![Maintainability](https://api.codeclimate.com/v1/badges/29c2b80e4866df517da3/maintainability)](https://codeclimate.com/github/susina/coding-standard/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/29c2b80e4866df517da3/test_coverage)](https://codeclimate.com/github/susina/coding-standard/test_coverage)

`susina/coding-standard` library is a set of [php-cs-fixer](https://cs.sensiolabs.com) rules for Susina project repository.
It's based on [PSR1](https://www.php-fig.org/psr/psr-1/) and [PSR12](https://www.php-fig.org/psr/psr-12/),
with the following differences:

-  always use _declare(strict_types=1)_ and put it at the beginning of the file, one space after `<?php` statement. I.e.: 
   `<?php declare(strict_types=1);`
-  always use [short array syntax](https://www.php.net/manual/en/language.types.array.php)
-  always put one space around string concatenation operator: `'string1' . 'string2'` 

## Installation

Run

```
$ composer require --dev susina/coding-standard
```

The installation script generates a stub configuration file `.php_cs.dist` in the root of your project, then it adds
[two scripts](#composer) into your `composer.json` and it adds the php-cs-fixer cache file to your `.gitignore`. 

## Configuration

After installation, you can find a `.php_cs.dist` file in the root of your project, containing a basic configuration:

```php
<?php declare(strict_types=1);

$config = new Susina\CodingStandard\Config();
$config->getFinder()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

return $config;
```
If your project follows the usual convention to put the code in `src` and tests in `tests` directories, there's nothing
else to do. Otherwise, you can modify your own configuration at your choice, as explained in
[php-cs-fixer documentation](https://cs.symfony.com/doc/config.html). The installation/update script is smart enough to
not overwrite your configuration file, if it's present.

## Composer

After the installation, your `composer.json` file contains the following lines:

```json
	"scripts" : {
		"cs" : "php-cs-fixer fix -v --diff --dry-run",
		"cs-fix" : "php-cs-fixer fix -v --diff"
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

### Travis

You can configure Travis to cache the `.php_cs.cache` file. Update your `.travis.yml`:

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
For full copyright information, please see [LICENSE](https://github.com/susina/coding-standard/blob/master/LICENSE)
file, in this repository.