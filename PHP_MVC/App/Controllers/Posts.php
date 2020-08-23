<?php

namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        View::renderTemplate('Posts/index');
    }
}
