<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

class Model
{
    protected static $table;
    protected static $primaryKey;
    protected static $db;

    protected static function getDB()
    {
        static::$db;
        if (static::$db === null) {
            try {
                static::$db = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8", Config::DB_USER, Config::DB_PASSWORD);
                !Config::SHOW_ERRORS ?: static::getDB()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return static::$db;
            } catch (PDOException $e) {
                if (config::SHOW_ERRORS) echo "Connection failed: " . $e->getMessage();
            }
        }
        return static::$db;
    }

    public static function all($where = true)
    {
        $table = static::$table;
        $stmt = static::getDB()->query("SELECT * FROM $table WHERE $where");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id, $field = '', $cond = '')
    {
        $table = static::$table;
        $field = !empty($field) ? $field : static::$primaryKey;
        $cond = !empty($cond) ? "`$field` = '$id' and $cond" : "`$field` = '$id'";
        $stmt = static::getDB()->query("SELECT * FROM $table WHERE $cond");
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

    public static function insertMultiple($keys, $data)
    {
        $keys = "(`" . implode("`, `", $keys) . "`)";
        $values = array();
        foreach ($data as $value)
            array_push($values, "'" . implode("', '", $value) . "'");
        $values = "(" . implode("), (", $values) . ")";
        $table = static::$table;
        $query = static::getDB()->prepare("INSERT INTO $table $keys VALUES $values");
        $count = $query->execute();
        return $query->rowCount();
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

    public static function delete($id, $field = '', $cond = '')
    {
        $table = static::$table;
        $field = !empty($field) ? $field : static::$primaryKey;
        $cond = !empty($cond) ? "$field = $id and $cond" : "$field = $id";
        $query = static::getDB()->prepare("DELETE FROM $table WHERE $cond");
        $count = $query->execute();
        return $query->rowCount() != 0 ? true : false;
    }

    public static function isExist($id, $field = '', $cond = '')
    {
        $table = static::$table;
        $field = !empty($field) ? $field : static::$primaryKey;
        $cond = !empty($cond) ? "`$field` = '$id' and $cond" : "`$field` = '$id'";
        $stmt = static::getDB()->query("SELECT * FROM $table WHERE $cond");
        return $stmt->rowCount() ? true : false;
    }

    public static function beginTransaction()
    {
        static::getDB()->beginTransaction();
    }

    public static function commit()
    {
        static::getDB()->commit();
    }

    public static function rollBack()
    {
        static::getDB()->rollBack();
    }

    public static function saveImage($key = '', $name = '')
    {
        $key = !empty($key) ? $key : "Image";
        if (isset($_FILES[$key]['name']) && !empty($_FILES[$key]['name'])) {
            $file_name = $_FILES[$key]['name'];
            $file_size = $_FILES[$key]['size'];
            $file_tmp = $_FILES[$key]['tmp_name'];
            $file_type = $_FILES[$key]['type'];
            $parts = explode('.', $file_name);
            $file_ext = strtolower(end($parts));
            $expensions = array("jpg", "jpeg");
            $name = !empty($name) ? $name : md5($file_name) . $file_ext;
            if (!(in_array($file_ext, $expensions) === false || $file_size > 2097152)) {
                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "//images//" . static::$table . "//" . $name);
                return true;
            }
        }
        return false;
    }

    public static function rename($newName, $oldName)
    {
        if ($newName == $oldName)
            return true;
        $path = $_SERVER['DOCUMENT_ROOT'] . "//images//" . static::$table . "//";
        if (file_exists($path . $newName))
            unlink($path . $newName);
        if (rename($path . $oldName, $path . $newName))
            return true;
        return false;
    }
}
