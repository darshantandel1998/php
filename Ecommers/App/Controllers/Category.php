<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use \Core\View;

class Category extends \Core\Controller
{
    public function viewAction()
    {
        $url = empty($this->route_params['url']) ?: $this->route_params['url'];
        $category = CategoryModel::find($url, 'Url_Key', "`Status` != 0");
        $childCategories = CategoryModel::all("`Parent_Category_Id` = " . $category['Id'], "`Status` != 0");
        $categoryIds = [$category['Id']];
        foreach($childCategories as $value) array_push($categoryIds, $value['Id']);
        $productIds = ProductCategoryModel::all("`category_id` IN (" . implode(', ', $categoryIds) . ") GROUP BY `Product_id`");
        foreach($productIds as $key => $value) $productIds[$key] = $value['product_id'];
        $products = ProductModel::all("`Id` IN (" . implode(', ', $productIds) . ") and `Status` != 0");
        if (!empty($category)) {
            $category = CategoryModel::PrepareDataView($category);
            View::renderTemplate('category', ['category' => $category, 'childCategories' => $childCategories, 'products' => $products]);
        } else
            throw new \Exception("$url Category not Found", 404);
    }
}
