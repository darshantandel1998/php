<?php

namespace App\Models\Admin;

class UsersModel extends \Core\Model
{
    public static function getAll()
    {
        $stmt = static::getDB()->query("SELECT * FROM users");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
