This package is ultra dependent, register these service providers and publish their config files
'Kenarkose\Files\Provider\FilesServiceProvider',
'Kenarkose\Sortable\SortableServiceProvider',
'Kenarkose\Transit\Provider\TransitServiceProvider',
'Simexis\Oembed\OembedServiceProvider',
'Intervention\Image\ImageServiceProvider',
'Dimsav\Translatable\TranslatableServiceProvider'

# Files
Easy media management for Laravel 5.

---
[![Build Status](https://travis-ci.org/kenarkose/Files.svg?branch=master)](https://travis-ci.org/kenarkose/Files)
[![Total Downloads](https://poser.pugx.org/kenarkose/Files/downloads)](https://packagist.org/packages/kenarkose/Files)
[![Latest Stable Version](https://poser.pugx.org/kenarkose/Files/version)](https://packagist.org/packages/kenarkose/Files)
[![License](https://poser.pugx.org/kenarkose/Files/license)](https://packagist.org/packages/kenarkose/Files)

## Features
- Compatible with Laravel 5
- Clean API for media management
- Media substitution (for audio and video files)
- Recursive Directories for containing media
- Building blocks for easy
- Auto determination of media types and STI (Single Table Inheritance) based media models
- Customization options for file mime types and media models
- Generator for default migrations
- A [phpunit](http://www.phpunit.de) test suite for easy development

## Installation
Installing Files is simple.

1. Pull this package in through [Composer](https://getcomposer.org).

    ```js
    {
        "require": {
            "kenarkose/files": "~2.0"
        }
    }
    ```

2. In order to register Files Service Provider add `'Kenarkose\Files\Provider\FilesServiceProvider'` to the end of `providers` array in your `config/app.php` file.
    ```php
    'providers' => array(
    
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        ...
        'Kenarkose\Files\Provider\FilesServiceProvider',
    
    ),
    ```
    
3. In order to persist the media, directory and substitute information, you have to create migrations for models. To do so, use the following command.
    ```bash
        php artisan files:migration
    ```
    Do not forget to migrate the database when prompted to or after modifying the generated migration file.

4. Finally, you may configure the default behaviour of Files by publishing and modifying the configuration file. To do so, use the following command. 
    ```bash
    php artisan vendor:publish
    ```
    Than, you will find the configuration file on the `config/files.php` path. Additional information about the options can be found in the comments of this file. All of the options in the config file are optional, and falls back to default if not specified; remove an option if you would like to use the default.

5. Please check the tests and source code for further documentation.

## Customization and Extension
Files plays well with its sibling packages:

- [Ownable](https://github.com/kenarkose/Ownable) Easy ownership for Eloquent Models.
- [Transit](https://github.com/kenarkose/Transit) Easy file uploading and downloading.

Please check the package documentations to implement the functionality.

## License
Files is released under [MIT License](https://github.com/kenarkose/Files/blob/master/LICENSE).