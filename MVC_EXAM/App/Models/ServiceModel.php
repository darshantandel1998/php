<?php

namespace App\Models;

class ServiceModel extends \Core\Model
{
    protected static $table = 'service_registrations';
    protected static $primaryKey = 'ServiceId';

    public static function prepareDataInsert($data)
    {
        $data['UserId'] = '1';
        return $data;
    }
}
