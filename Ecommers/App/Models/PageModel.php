<?php

namespace App\Models;

class PageModel extends \Core\Model
{
    protected static $table = 'cms_pages';
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
}
