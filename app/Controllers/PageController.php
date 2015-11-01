<?php

namespace App\Controllers;

use Peon\Router;

class PageController
{
    public function welcome($name = null)
    {
        $router = new Router;

        include path('/views/page/welcome.tpl');
    }
}