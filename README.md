# Susina Coding Standard

![Test Installation](https://github.com/susina/coding-standard/workflows/Test%20Suite/badge.svg)

Susina Coding Standard library is a set of [php-cs-fixer](https://cs.sensiolabs.com) rules for Susina project repository.
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

## Configuration

Create a `.php-cs-fixer.php` file in the root of your project:

```php
<?php declare(strict_types=1);

$config = new Susina\CodingStandard\Config();
$config->getFinder()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->excludes(['fixtures'])
;

return $config;
```

See [php-cs-fixer documentation](https://cs.symfony.com/doc/config.html) for further information.

## Composer

Add to your `composer.json` file the following lines:

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

### Git

We suggest adding `.php-cs-fixer.cache` to .gitignore:

vendor/
.php-cs-fixer.cache

### Travis

You can configure Travis to cache the `.php-cs-fixer.cache` file. Update your `.travis.yml`:

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

### Github Actions

You can configure Github actions to cache `.php-cs-fixer.cache` file. In your workflow file,
into the Cache configuration step, simply add `~/.php-cs-fixer.cache` under the `path` key:

```yml
- name: Cache multiple paths
  uses: actions/cache@v2
  with:
     path: |
        ~/.php-cs-fixer.cache
     key: your-awesome-cache-key
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