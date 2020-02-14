<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

class Model
{
    protected static $table;
    protected static $primaryKey;

    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            try {
                $db = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8", Config::DB_USER, Config::DB_PASSWORD);
                !Config::SHOW_ERRORS ?: $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return $db;
    }

    public static function all()
    {
        $table = static::$table;
        $stmt = static::getDB()->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id, $field='')
    {
        $table = static::$table;
        $condField = !empty($field) ? $field : static::$primaryKey;
        $stmt = static::getDB()->query("SELECT * FROM $table WHERE $condField = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($data)
    {
        $key = implode(', ', array_keys($data));
        $value = "'" . implode("', '", $data) . "'";
        $table = static::$table;
        $query = static::getDB()->prepare("INSERT INTO $table ($key) VALUES ($value)");
        $count = $query->execute();
        return static::getDB()->lastInsertId();
    }

    public static function update($id, $data)
    {
        $keyvalue = array();
        foreach ($data as $key => $value)
            array_push($keyvalue, "`$key`='$value'");
        $keyValue = implode(", ", $keyvalue);
        $table = static::$table;
        $primaryKey = static::$primaryKey;
        $query = static::getDB()->prepare("UPDATE $table SET $keyValue WHERE $primaryKey = $id");
        $count = $query->execute();
        return $count != 0 ? true : false;
    }

    public static function delete($id)
    {
        $table = static::$table;
        $primaryKey = static::$primaryKey;
        $query = static::getDB()->prepare("DELETE FROM $table WHERE $primaryKey = $id");
        $count = $query->execute();
        return $count != 0 ? true : false;
    }
}
