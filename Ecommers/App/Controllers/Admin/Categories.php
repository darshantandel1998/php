<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use Core\Model;
use Core\View;

class Categories extends \Core\Controller
{
    public function indexAction()
    {
        $categories = CategoryModel::all();
        View::renderTemplate('Admin/Categories/index', ['categories' => $categories]);
    }

    public function addAction()
    {
        $parentCategories = CategoryModel::all("`Parent_Category_Id` = 0");
        View::renderTemplate('Admin/Categories/form', ['type' => 'Add', 'parentCategories' => $parentCategories]);
    }

    public function addDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = $_POST;
            $category = CategoryModel::prepareDataInsert($category);
            $parentCategories = CategoryModel::all("`Parent_Category_Id` = 0");
            if (CategoryModel::isExist($category['Url_Key'], 'Url_Key')) {
                $this->alert('Url Key already exist, please change Category Title.', 'alert alert-danger');
                View::renderTemplate('Admin/Categories/form', ['type' => 'Add', 'category' => $_POST, 'parentCategories' => $parentCategories]);
            } else {
                Model::beginTransaction();
                if (CategoryModel::insert($category)) {
                    if (CategoryModel::saveImage('', $category['Image'])) {
                        Model::commit();
                        $this->alert('Category Inserted.', 'alert alert-success');
                        $this->redirect('admin/categories');
                        die;
                    }
                }
                Model::rollBack();
                $this->alert('Category not Inserted.', 'alert alert-danger');
                View::renderTemplate('Admin/Categories/form', ['type' => 'Add', 'category' => $_POST, 'parentCategories' => $parentCategories]);
            }
        } else
            $this->redirect('admin/categories');
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $category = CategoryModel::find($this->route_params['id']);
            $parentCategories = CategoryModel::all("`Parent_Category_Id` = 0");
            View::renderTemplate('Admin/Categories/form', ['type' => 'Edit', 'category' => $category, 'parentCategories' => $parentCategories]);
        } else
            $this->redirect('admin/categories');
    }

    public function editDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['Id'];
            $category = $_POST;
            $category = CategoryModel::prepareDataInsert($category);
            $oldImageName = CategoryModel::find($id)['Image'];
            $parentCategories = CategoryModel::all("`Parent_Category_Id` = 0");
            if (CategoryModel::isExist($category['Url_Key'], 'Url_Key', "`Id` != $id")) {
                $this->alert('Url Key already exist, please change Category Title.', 'alert alert-danger');
                View::renderTemplate('Admin/Categories/form', ['type' => 'Edit', 'category' => $_POST, 'parentCategories' => $parentCategories]);
            } else {
                Model::beginTransaction();
                if (CategoryModel::update($id, $category)) {
                    $flag = false;
                    if (empty($_FILES['Image']['name'])) {
                        if (CategoryModel::rename($category['Image'], $oldImageName)) {
                            $flag = true;
                        }
                    } else if (CategoryModel::saveImage('', $category['Image'])) {
                        $flag = true;
                    }
                    if ($flag == true) {
                        Model::commit();
                        $this->alert('Category Updated.', 'alert alert-success');
                        $this->redirect('admin/categories');
                        die;
                    }
                }
                Model::rollBack();
                $this->alert('Category not Updated.', 'alert alert-danger');
                View::renderTemplate('Admin/Categories/form', ['type' => 'Edit', 'category' => $_POST, 'parentCategories' => $parentCategories]);
            }
        } else
            $this->redirect('admin/categories');
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (CategoryModel::delete($id))
                $this->alert("Category Deleted.", "alert alert-success");
            else
                $this->alert("Category not Deleted.", "alert alert-danger");
        }
        $this->redirect('admin/Categories');
    }
}
