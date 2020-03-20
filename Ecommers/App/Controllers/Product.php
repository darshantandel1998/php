<?php

namespace App\Controllers;

use App\Models\ProductModel;
use \Core\View;

class Product extends \Core\Controller
{
    public function viewAction()
    {
        $url = empty($this->route_params['url']) ?: $this->route_params['url'];
        $product = ProductModel::find($url, 'Url_Key', "`Status` != 0");
        if (!empty($product)) {
            $product = ProductModel::prepareDataView($product);
            View::renderTemplate('product', ['product' => $product]);
        } else
            throw new \Exception("$url Product not Found", 404);
    }
}
