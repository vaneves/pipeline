# Tosko

PHP class package for [League\Pipeline](https://pipeline.thephpleague.com/) to do frontend tasks.

## Install

Composer:

```
composer require vaneves/tosko
```

## Usage

```php

<?php

use Vaneves\Tosko\Pipeline;
use Vaneves\Tosko\Src;
use Vaneves\Tosko\Dist;
use Vaneves\Tosko\Concat;

$js = (new Pipeline)
    ->pipe(new Concat('all.js'))
    ->pipe(new Dist('assets/'));

$js->process(new Src([
    'path/to/lib/jquery.js',
    'path/to/lib/bootstrap.js',
    'path/to/my/*/*.js',
    'my-script.js',
]));


$css = (new Pipeline)
    ->pipe(new Concat('all.css'))
    ->pipe(new Dist('assets/'));

$css->process(new Src([
    'path/to/lib/bootstrap.css',
    'my-style.css',
]));


// To just copy files, don't use Concat
$font = (new Pipeline)
    ->pipe(new Dist('assets/fonts'));

$font->process(new Src([
    'path/to/fonts/*',
]));

```