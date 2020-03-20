<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use Core\Model;
use Core\View;

class Products extends \Core\Controller
{
    public function indexAction()
    {
        $products = ProductModel::all();
        View::renderTemplate('Admin/Products/index', ['products' => $products]);
    }

    public function addAction()
    {
        $categories = CategoryModel::all();
        View::renderTemplate('Admin/Products/form', ['type' => 'Add', 'categories' => $categories]);
    }

    public function addDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = $_POST;
            $categoryList = $product['Category_Id'];
            $product = ProductModel::prepareDataInsert($product);
            $categories = CategoryModel::all();
            if (ProductModel::isExist($product['Url_Key'], 'Url_Key')) {
                $this->alert('Url Key already exist, please change Product Title.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Add', 'product' => $_POST, 'categories' => $categories]);
            } else if (ProductModel::isExist($product['SKU'], 'SKU')) {
                $this->alert('SKU already exist.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Add', 'product' => $_POST, 'categories' => $categories]);
            } else {
                Model::beginTransaction();
                if ($id = ProductModel::insert($product)) {
                    foreach ($categoryList as $key => $value)
                        $categoryList[$key] = [$id, $value];
                    if (ProductCategoryModel::insertMultiple(["product_id", "category_id"], $categoryList)) {
                        if (ProductModel::saveImage('', $product['Image'])) {
                            Model::commit();
                            $this->alert('Product Inserted.', 'alert alert-success');
                            $this->redirect('admin/products');
                            die;
                        }
                    }
                }
                Model::rollBack();
                $this->alert('Product not Inserted.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Add', 'product' => $_POST, 'categories' => $categories]);
            }
        } else
            $this->redirect('admin/products');
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $product = ProductModel::find($this->route_params['id']);
            $CategoryData = ProductCategoryModel::all("`product_id` = " . $product['Id']);
            foreach ($CategoryData as $key => $value)
                $product['Category_Id'][$key] = $value['category_id'];
            $categories = CategoryModel::all();
            View::renderTemplate('Admin/Products/form', ['type' => 'Edit', 'product' => $product, 'categories' => $categories]);
        } else
            $this->redirect('admin/products');
    }

    public function editDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['Id'];
            $product = $_POST;
            $categoryList = $product['Category_Id'];
            $product = ProductModel::prepareDataInsert($product);
            $oldImageName = ProductModel::find($id)['Image'];
            $categories = CategoryModel::all();
            if (ProductModel::isExist($product['Url_Key'], 'Url_Key', "`Id` != $id")) {
                $this->alert('Url Key already exist, please change Product Title.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Edit', 'product' => $_POST, 'categories' => $categories]);
            } else if (ProductModel::isExist($product['SKU'], 'SKU', "`Id` != $id")) {
                $this->alert('SKU already exist.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Edit', 'product' => $_POST, 'categories' => $categories]);
            } else {
                Model::beginTransaction();
                if (ProductModel::update($id, $product)) {
                    if (ProductCategoryModel::delete($id, 'product_id')) {
                        foreach ($categoryList as $key => $value)
                            $categoryList[$key] = [$id, $value];
                        if (ProductCategoryModel::insertMultiple(["product_id", "category_id"], $categoryList)) {
                            $flag = false;
                            if (empty($_FILES['Image']['name'])) {
                                if (ProductModel::rename($product['Image'], $oldImageName)) {
                                    $flag = true;
                                }
                            } else if (ProductModel::saveImage('', $product['Image'])) {
                                $flag = true;
                            }
                            if ($flag == true) {
                                Model::commit();
                                $this->alert('Product Updated.', 'alert alert-success');
                                $this->redirect('admin/products');
                                die;
                            }
                        }
                    }
                }
                Model::rollBack();
                $this->alert('Product not Updated.', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['type' => 'Edit', 'product' => $_POST, 'categories' => $categories]);
            }
        } else
            $this->redirect('admin/products');
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (ProductModel::delete($id))
                $this->alert("Product Deleted.", "alert alert-success");
            else
                $this->alert("Product not Deleted.", "alert alert-danger");
        }
        $this->redirect('admin/products');
    }
}
