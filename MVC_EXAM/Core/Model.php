<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

class Model
{
    protected static $table;
    protected static $primaryKey;

    //     protected static $sql;

    //     protected static function getDB()
    //     {
    //         static $db = null;
    //         if ($db === null) {
    //             try {
    //                 $db = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8", Config::DB_USER, Config::DB_PASSWORD);
    //                 !Config::SHOW_ERRORS ?: $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //                 return $db;
    //             } catch (PDOException $e) {
    //                 echo "Connection failed: " . $e->getMessage();
    //             }
    //         }
    //         return $db;
    //     }

    //     public static function all($con = '', $field = '')
    //     {
    //         $table = static::$table;
    //         $cond = empty($value) && empty($field) ? "true" : "$field = $value";
    //         $stmt = static::getDB()->query("SELECT * FROM $table WHERE $cond");
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }

    //     public static function find($id, $field = '', $cond='')
    //     {
    //         $table = static::$table;
    //         $field = !empty($field) ? $field : static::$primaryKey;
    //         $cond = $cond == '' ? "`$field` = '$id'" : "`$field` = '$id' and $cond";
    //         $stmt = static::getDB()->query("SELECT * FROM $table WHERE $cond");
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     }

    //     public static function insert($data)
    //     {
    //         $key = implode(', ', array_keys($data));
    //         $value = "'" . implode("', '", $data) . "'";
    //         $table = <?php

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
                if (config::SHOW_ERRORS) echo "Connection failed: " . $e->getMessage();
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
        $keys = "`" . implode("`, `", array_keys($data)) . "`";
        $values = "'" . implode("', '", $data) . "'";
        $table = static::$table;
        $query = static::getDB()->prepare("INSERT INTO $table ($keys) VALUES ($values)");
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
static::$table;
    //         $query = static::getDB()->prepare("INSERT INTO $table ($key) VALUES ($value)");
    //         $count = $query->execute();
    //         return static::getDB()->lastInsertId();
    //     }

    //     public static function update($id, $data)
    //     {
    //         $keyvalue = array();
    //         foreach ($data as $key => $value)
    //             array_push($keyvalue, "`$key`='$value'");
    //         $keyValue = implode(", ", $keyvalue);
    //         $table = static::$table;
    //         $primaryKey = static::$primaryKey;
    //         $query = static::getDB()->prepare("UPDATE $table SET $keyValue WHERE $primaryKey = $id");
    //         $count = $query->execute();
    //         return $count != 0 ? true : false;
    //     }

    //     public static function delete($id, $field = '')
    //     {
    //         $tableName = static::$table;
    //         $field = !empty($field) ? $field : static::$primaryKey;
    //         $sql = "DELETE FROM $tableName WHERE $field = $id";
    //         $stmt = static::getDB()->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->rowCount() > 0 ? true : false;
    //     }

    //     public static function join($fields1, $fields2, $table2, $cond, $join = "LEFT")
    //     {
    //         $table1 = static::$table;
    //         $fields1 = "TB1." . implode(", TB1.", $fields1);
    //         $fields2 = "TB2." . implode(", TB2.", $fields2);
    //         $fields = "$fields1, $fields2";
    //         $stmt = static::getDB()->query("SELECT $fields FROM $table1 TB1 $join JOIN $table2 TB2 ON $cond");
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     }

    //     public static function isExist($id, $field = '', $cond='')
    //     {
    //         $table = static::$table;
    //         $field = !empty($field) ? $field : static::$primaryKey;
    //         $cond = $cond == '' ? "`$field` = '$id'" : "`$field` = '$id' and $cond";
    //         $stmt = static::getDB()->query("SELECT * FROM $table WHERE $cond");
    //         return $stmt->rowCount() ? true : false;
    //     }





    //////////////////////////////////////////////////////////////
    // public static function InsertQuery($data)
    // {
    //     $key = implode(', ', array_keys($data));
    //     $value = "'" . implode("', '", $data) . "'";
    //     $table = static::$table;
    //     static::$sql = "INSERT INTO $table ($key) Values ($values)" 
    // }

    // public static function UpdateQuery($id, $data)
    // {
    //     $keyvalue = array();
    //     foreach ($data as $key => (string)$value)
    //         array_push($keyvalue, "`$key`='$value'");
    //     $keyValue = implode(", ", $keyvalue);
    //     $table = static::$table;
    //     $primaryKey = static::$primaryKey;
    //     static::$sql = "UPDATE $table SET $keyValues";

    // }

    // public static function DeleteQuery()
    // {

    // }

    // public static function where()
    // {
    //     static::$sql .= " WHERE $field, $value";
    // }

    // public static function limit()
    // {
    //     Static::function .= " ORDER BY $field ";
    // }


}
