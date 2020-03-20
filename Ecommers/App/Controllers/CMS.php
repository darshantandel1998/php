<?php

namespace App\Controllers;

use App\Config;
use App\Models\PageModel;
use Core\View;

class CMS extends \Core\Controller
{
    public function view()
    {
        $url = !empty($this->route_params['url']) ? $this->route_params['url'] : Config::BASE_CMS;
        $page = PageModel::find($url, 'Url_Key', "`Status` != 0");
        if (!empty($page))
            View::renderTemplate('cms', ['page' => $page]);
        else
            throw new \Exception("$url CMS Page not Found", 404);
    }
}
