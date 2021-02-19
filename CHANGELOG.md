# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2021-02-19
### Addded
-  Add post installation Composer script to automatically:
    -  create a basic configuration file
    -  add two scripts to _composer.json_ file: `composer cs` to check the code style and `composer cs-fix` to fix it
    -  add `.php_cs.cache` (php-cs-fixer cache file) to `.gitignore`
-  Add Phpunit to the dev dependencies, to test the composer script
-  Add php json extension to the dependencies, to manipulate _composer.json_ file
-  Add a test suite Github Actions workflow
-  Add a Github Actions workflow to create a coverage report and update it to [CodeClimate](https://codeclimate.com/)
   quality tool
-  Create a `CHANGELOG.md` file

### Changed
-  Change rules to adhere to PSR-12

### Fixed
Fix spaces around `|` operator.
See https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/5495

## [1.3.1] - 2020-12-22
### Changed
-  Fix the rules to add `declare(strict_types=1);` instruction after the `<?php` statement, with one space separation. I.e.
```php
<?php declare(strict_types=1);
/*
 * Copyright information
 */
 
 .......................
 ```
 
 ## [1.3.0] - 2020-12-22
 ### Changed
-  Remove the line break after opening tag
-  Full PHP 8 compatibility

## [1.2.1] - 2020-12-22
### Added
-  Add Github Actions workflow to test installation with different PHP versions

## [1.2.0] - 2020-04-08
### Changed
-  Move the library to [Susina](https://github.com/susina) organization
-  Change the library namespace to `Susina\CodingStandard`

## [1.1.0] - 2020-01-06
### Removed
-  Remove the following rules, considered too strict:
    -  All PHPUnit test classes should be marked as internal
    -  Adds a default @coversNothing annotation to PHPUnit test classes that have no @covers* annotation
    -  All PHPUnit test cases should have @small, @medium or @large annotation to enable run time limits

## [1.0.1] - 2020-01-06
### Changed
Update README

## [1.0.0] - 2020-01-04
### Added
Define the coding standard, based on PSR-1 and PSR-2.