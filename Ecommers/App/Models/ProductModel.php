<?php

namespace App\Models;

class ProductModel extends \Core\Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'Id';

    public static function prepareDataInsert($data)
    {
        $data['Url_Key'] = strtolower(preg_replace('/[ ]+/', "-", preg_replace('/[^A-Za-z0-9- ]/', '', $data['Product_Name'])));
        $data['Image'] = $data['Url_Key'] . ".jpg";
        unset($data['Category_Id']);
        return $data;
    }

    public static function PrepareDataView($data)
    {
        $categoryId = ProductCategoryModel::find($data['Id'], 'product_id')['category_id'];
        $category = CategoryModel::find($categoryId);
        $parentCategory = CategoryModel::find($category['Parent_Category_Id']);
        $data['Category_Name'] = $category['Category_Name'];
        $data['Category_Url_Key'] = $category['Url_Key'];
        $data['Parent_Category_Name'] = $parentCategory['Category_Name'];
        $data['Parent_Category_Url_Key'] = $parentCategory['Url_Key'];
        return $data;
    }
}
