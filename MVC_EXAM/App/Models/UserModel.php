<?php

namespace App\Models;

class UserModel extends \Core\Model
{
    protected static $table = 'users';
    protected static $primaryKey = 'UserId';

    public static function prepareDataInsert($data)
    {
        $data['Password'] = md5($data['Password']);
        return $data;
    }
}
