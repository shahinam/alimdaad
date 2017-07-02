# Drupal Shade

This is a Composer-based installer for the [Shade](https://www.drupal.org/project/shade) Drupal distribution.

## Usage
```
$ composer create-project shahinam/shade-project MY_PROJECT
```

## Basic composer usage
### Install a module
```
composer require drupal/<module-name>
```
Examples
```
composer require drupal/devel
composer require drupal/ctools
```

This will install latest available version. If you want to specify a version
```
composer require drupal/<module-name>:<version>
```

### Update a module
```
composer update drupal/<module-name>
```
