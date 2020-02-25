<?php

namespace App\Models;

class AddressModel extends \Core\Model
{
    protected static $table = 'user_addresses';
    protected static $primaryKey = 'AddressId';

    public static function prepareDataInsert($data)
    {
        $data['UserId'] = '1';
        return $data;
    }
}
