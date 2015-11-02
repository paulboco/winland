<?php

/*
|--------------------------------------------------------------------------
| Get Application Configuration
|--------------------------------------------------------------------------
*/

$config = require __DIR__ . '/../config/app.php';

/*
|--------------------------------------------------------------------------
| Setup PHP
|--------------------------------------------------------------------------
*/

error_reporting(E_ALL);

if ($config['debug']) {
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);
    ini_set('log_errors', 0);
} else {
    ini_set('display_errors', 0);
    ini_set('html_errors', 0);
    ini_set('log_errors', 1);
}

/*
|--------------------------------------------------------------------------
| Clean Up
|--------------------------------------------------------------------------
*/

unset($config);
