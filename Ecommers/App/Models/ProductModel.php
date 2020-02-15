<?php

namespace App\Models;

class ProductModel extends \Core\Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'Id';

    public static function prepareDataInsert($data)
    {
        $data['Url_Key'] = strtolower(preg_replace('/[ ]+/', "-", preg_replace('/[^A-Za-z- ]/', '', $data['Product_Name'])));
        return $data;
    }
}
