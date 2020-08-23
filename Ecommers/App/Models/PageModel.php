<?php

namespace App\Models;

class PageModel extends \Core\Model
{
    protected static $table = 'cms_pages';
    protected static $primaryKey = 'Id';

    public static function prepareDataInsert($data)
    {
        $data['Url_Key'] = strtolower(preg_replace('/[ ]+/', "-", preg_replace('/[^A-Za-z0-9- ]/', '', $data['Page_Title'])));
        return $data;
    }
}
