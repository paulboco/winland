<?php

namespace App\Controllers;

use Peon\Router;

class PageController
{
    /**
     * The Welcome Page
     */
    public function welcome($name = null)
    {
        $router = new Router;
        include path('/views/page/welcome.tpl');
    }

    /**
     * The About Page
     */
    public function about()
    {
        include path('/views/page/about.tpl');
    }
}