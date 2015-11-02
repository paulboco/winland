<?php

/*
|--------------------------------------------------------------------------
| Set Debug Mode
|--------------------------------------------------------------------------
 */

define('DEBUG', true);

/*
|--------------------------------------------------------------------------
| Setup PHP
|--------------------------------------------------------------------------
 */

error_reporting(E_ALL);

if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);
    ini_set('log_errors', 0);
} else {
    ini_set('display_errors', 0);
    ini_set('html_errors', 0);
    ini_set('log_errors', 1);
}
