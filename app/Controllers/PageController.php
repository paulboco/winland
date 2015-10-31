<?php

namespace App\Controllers;

class PageController
{
    public function welcome($name = null)
    {
        include path('/views/page/welcome.tpl');
    }
}