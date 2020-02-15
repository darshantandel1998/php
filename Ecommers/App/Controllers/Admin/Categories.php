<?php

namespace App\Controllers\Admin;

use App\Controllers\Category;
use Core\View;
use App\Models\CategoryModel;

class Categories extends \Core\Controller
{
    public function indexAction()
    {
        $data = CategoryModel::join(["Category_Name", "Id"], ["Category_Name as P_Category"], 'categories', 'TB1.Parent_Category_Id = TB2.Id');
        echo "<pre>";
        print_r($data);
        // $categories = CategoryModel::all();
        // View::renderTemplate('Admin/Categories/index', ['categories' => $categories]);
    }

    public function addAction()
    {
        View::renderTemplate('Admin/Categories/form');
    }

    public function addDataAction()
    {
        echo "DD";
        // $data = $_POST;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // $data = CategoryModel::prepareDataInsert($data);
    }

    public function editAction()
    {
        View::renderTemplate('Admin/Categories/form');
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (CategoryModel::delete($id)) {
                $this->alert("Category Deleted Successfully", "alert alert-success");
            } else {
                $this->alert("Category Not Deleted", "alert alert-danger");
            }
        }
        header('Location: /admin/categories');
    }
}
