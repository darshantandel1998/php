<?php

namespace App\Models;

use PDO;

class CategoryModel extends \Core\Model
{
    protected static $table = 'categories';
    protected static $primaryKey = 'Id';

    public static function prepareDataInsert($data)
    {
        $data['Url_Key'] = strtolower(preg_replace('/[ ]+/', "-", preg_replace('/[^A-Za-z0-9- ]/', '', $data['Category_Name'])));
        $data['Image'] = $data['Url_Key'] . ".jpg";
        return $data;
    }

    public static function PrepareDataView($data)
    {
        $parentCategory = static::find($data['Parent_Category_Id']);
        $data['Parent_Category_Name'] = $parentCategory['Category_Name'] ?? [];
        $data['Parent_Category_Url_Key'] = $parentCategory['Url_Key'] ?? [];
        return $data;
    }

    public static function getCategories()
    {
        $stmt = static::getDB()->query("SELECT tb1.Category_Name as Parent_Category_Name, tb1.Url_Key as Parent_Url_Key, GROUP_CONCAT(tb2.Category_Name SEPARATOR ', ') as Category_Name, GROUP_CONCAT(tb2.Url_Key SEPARATOR ', ') as Url_Key FROM categories tb1 LEFT JOIN categories tb2 on tb2.Parent_Category_Id = tb1.Id WHERE tb1.Parent_Category_Id = 0 GROUP by tb1.Category_Name");
        $result = $stmt->fetchAll(PDO::FETCH_NAMED);
        foreach ($result as $key => $value) {
            if (!empty($value['Category_Name']) && !empty($value['Url_Key'])) {
                $result[$key]['Category_Name'] = explode(', ', $value['Category_Name']);
                $result[$key]['Url_Key'] = explode(', ', $value['Url_Key']);
            }
        }
        return $result;
    }
}
