<?php

namespace App\Controllers\Admin;

use \Core\View;
use \App\Models\Admin\UsersModel;

class Users extends \Core\Controller
{
    public function indexAction()
    {
        $users = UsersModel::all();
        View::renderTemplate('Admin/Users/index', ['users' => $users]);
    }

    public function createFormAction()
    {
        View::renderTemplate('Admin/Users/form', ['type' => "Create"]);
    }

    public function createAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST;
            $email = "'" . $_POST['Email'] . "'";
            if (empty(UsersModel::find($email, 'Email'))) {
                if (UsersModel::insert($user)) {
                    $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Inserted Successfully'];
                    header('Location: /admin/users');
                } else {
                    $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'User not Inserted'];
                    View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Create"]);
                }
            } else {
                $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'Email Already Exist!'];
                View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Create"]);
            }
        } else {
            header('Location: /admin/users');
        }
    }

    public function updateFormAction()
    {
        if (isset($_POST['update'])) {
            $id = $_POST['update'];
            $user = UsersModel::find($id);
            View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Update"]);
        } else
            header('Location: /admin/users');
    }

    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['UserId'];
            $user = $_POST;
            $email = "'" . $_POST['Email'] . "'";
            if (empty(UsersModel::find($email, 'Email'))) {
                if (UsersModel::update($id, $user)) {
                    $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Updated Successfully'];
                    header('Location: /admin/users');
                } else {
                    $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User not Updated'];
                    View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Update"]);
                }
            } else {
                $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'Email Already Exist!'];
                View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Update"]);
            
            }
        } else {
            header('Location: /admin/users');
        }
    }

    public function deleteAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            UsersModel::delete($id);
        }
        header('Location: /admin/users');
    }
}
