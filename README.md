# Documents
Document management system with embedding, uploading, downloading for different media types.
 
---
[![Build Status](https://travis-ci.org/NuclearCMS/Documents.svg?branch=master)](https://travis-ci.org/NuclearCMS/Documents)
[![Total Downloads](https://poser.pugx.org/Nuclear/Documents/downloads)](https://packagist.org/packages/Nuclear/Documents)
[![Latest Stable Version](https://poser.pugx.org/Nuclear/Documents/version)](https://packagist.org/packages/Nuclear/Documents)
[![License](https://poser.pugx.org/Nuclear/Documents/license)](https://packagist.org/packages/Nuclear/Documents)
 
This package is intended for [Nuclear CMS](https://github.com/NuclearCMS/Nuclear) and it constitutes its main document management functionality. It is developed separately to enable individual development, testing and possible reuse.
 
## Installation
Installing Documents is simple.
 
1. Pull this package in through [Composer](https://getcomposer.org).
    ```js
    {
        "require": {
            "nuclear/documents": "~0.9"
        }
    }
    ```

2. In order to register Documents Service Provider add `'Nuclear\Documents\Providers\DocumentsServiceProvider'` together with other package providers that Documents rely on to the end of `providers` array in your `config/app.php` file.
    ```php
    'providers' => array(
    
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        ...
        'Nuclear\Documents\Providers\DocumentsServiceProvider',
        'Kenarkose\Files\Provider\FilesServiceProvider',
        'Kenarkose\Sortable\SortableServiceProvider',
        'Kenarkose\Transit\Provider\TransitServiceProvider',
        'Simexis\Oembed\OembedServiceProvider',
        'Intervention\Image\ImageServiceProvider',
        'Dimsav\Translatable\TranslatableServiceProvider'
    
    ),
    ```
    
3. Publish the migrations and configuration files.
    ```bash
    php artisan vendor:publish --provider:"Nuclear\Documents\Providers\DocumentsServiceProvider"
    ```
    Do not forget to migrate the database.

4. Please check the tests and source code for further documentation.
 
## License
Documents is released under [MIT License](https://github.com/NuclearCMS/Documents/blob/master/LICENSE).
