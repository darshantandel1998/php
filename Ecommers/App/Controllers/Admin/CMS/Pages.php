<?php

namespace App\Controllers\Admin\CMS;

use App\Models\PageModel;
use Core\View;

class Pages extends \Core\Controller
{
    public function indexAction()
    {
        $pages = PageModel::all();
        View::renderTemplate('Admin/CMS/Pages/index', ['pages' => $pages]);
    }

    public function addAction()
    {
        View::renderTemplate('Admin/CMS/Pages/form');
    }

    public function editAction()
    {
        View::renderTemplate('Admin/CMS/Pages/form');
    }
}
