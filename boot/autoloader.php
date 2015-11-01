<?php

/*
|--------------------------------------------------------------------------
| Register The Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendor/phpfig/Autoloader.php';
$autoloader = new \Phpfig\Autoloader;
$autoloader->register();

/*
|--------------------------------------------------------------------------
| Get The Autoloader Configuration
|--------------------------------------------------------------------------
*/

$autoloadConfig = require __DIR__ . '/../config/autoload.php';

/*
|--------------------------------------------------------------------------
| Require Files
|--------------------------------------------------------------------------
*/

foreach ($autoloadConfig['files'] as $path) {
    require(__DIR__ . '/../' . $path);
}

/*
|--------------------------------------------------------------------------
| Register Namespaces
|--------------------------------------------------------------------------
*/

foreach ($autoloadConfig['namespaces'] as $namespace => $path) {
    $autoloader->addNamespace($namespace, __DIR__ . '/../' . $path);
}

/*
|--------------------------------------------------------------------------
| Clean Up
|--------------------------------------------------------------------------
*/

unset($autoloader, $autoloadConfig, $namespace, $path);
