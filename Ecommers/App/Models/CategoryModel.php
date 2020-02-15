<?php

namespace App\Models;

use PDO;

class CategoryModel extends \Core\Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'Id';

    public static function prepareDataInsert($data)
    {
        $data['Url_Key'] = strtolower(preg_replace('/[ ]+/', "-", preg_replace('/[^A-Za-z- ]/', '', $data['Category_Name'])));
        return $data;
    }

    public static function getParentCategories()
    {
        return parent::all('0', 'Parent_Category_Id');
    }

    public static function getChildCategories()
    {
        $table = static::$table;
        $stmt = static::getDB()->query("SELECT * FROM $table WHERE `Parent_Category_Id`!='0'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
