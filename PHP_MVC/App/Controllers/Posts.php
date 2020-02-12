<?php

namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        View::renderTemplate('Posts/index');
    }

    public function editAction()
    {
        View::renderTemplate('Posts/edit', ['params' => $this->route_params, 'gets' => $_GET]);
    }
}
