<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use Core\View;
use App\Models\ProductModel;

class Products extends \Core\Controller
{
    public function indexAction()
    {
        $products = ProductModel::all();
        View::renderTemplate('Admin/Products/index', ['products' => $products]);
    }

    public function addAction()
    {
        $categories = CategoryModel::getChildCategories();
        View::renderTemplate('Admin/Products/form', ['type' => 'Add', 'categories' => $categories]);
    }

    public function addDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = $_POST;
            $product = ProductModel::prepareDataInsert($product);



            if (ProductModel::insert($product)) {
                $this->alert('User Inserted', 'alert alert-success');
                $this->redirect('admin/products');
            } else {
                $this->alert('User not Inserted', 'alert alert-danger');
                View::renderTemplate('Admin/Products/form', ['user' => $product, 'type' => "Add"]);
            }



        } else {
            $this->redirect('admin/products');
        }

        //     $email = "'" . $_POST['Email'] . "'";
        //     if (empty(ProductModel::find($email, 'Email'))) {
        //         if (ProductModel::insert($user)) {
        //             $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Inserted Successfully'];
        //             header('Location: /admin/users');
        //         } else {
        //             $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'User not Inserted'];
        //             View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Create"]);
        //         }
        //     } else {
        //         $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'Email Already Exist!'];
        //         View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Create"]);
        //     }
        // } else {
        //     header('Location: /admin/users');
        // }
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $product = ProductModel::find($this->route_params['id']);
            View::renderTemplate('Admin/Products/form', ['product' => $product, 'type' => 'Edit']);
        } else
            $this->redirect('admin/products');
    }

    public function editData()
    {
        // $id = $this->route_params['id'];
        // if (!empty($id)) {
        //     $user = $_POST;
        //     if (ProductModel::update($id, $user)) {
        //         $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Updated Successfully'];
        //         header('Location: /admin/users');
        //     } else {
        //         $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User not Updated'];
        //         View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Update"]);
        //     }
        // } else {
        //     header('Location: /admin/users');
        // }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (ProductModel::delete($id)) {
                $this->alert("Product Deleted.", "alert alert-success");
            } else {
                $this->alert("Product not Deleted.", "alert alert-danger");
            }
        }
        $this->redirect('admin/products');
    }
}
