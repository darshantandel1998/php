<?php

namespace App\Models;

use PDO;

class ServiceModel extends \Core\Model
{
    protected static $table = 'service_registrations';
    protected static $primaryKey = 'ServiceId';

    public static function prepareDataInsert($data)
    {
        $data['UserId'] = $_SESSION['isUserLogin'];
        return $data;
    }

    public static function getTimeslot($serviceCenter, $date)
    {
        $table = static::$table;
        $stmt = static::getDB()->query("SELECT `Timeslot` FROM $table WHERE `ServiceCenter`='$serviceCenter' and `Date`='$date' GROUP BY `Timeslot` HAVING COUNT(*) > 2");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
