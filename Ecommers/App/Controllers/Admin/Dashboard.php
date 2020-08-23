<?php

namespace App\Controllers\Admin;

use Core\View;

class Dashboard extends \Core\Controller
{
    public function indexAction()
    {
        View::renderTemplate('adminBase');
    }
}
