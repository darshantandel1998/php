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

    public function addAction()
    {
        View::renderTemplate('Admin/Users/form', ['type' => "Add"]);
    }

    public function addDataAction()
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
                    View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Add"]);
                }
            } else {
                $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'Email Already Exist!'];
                View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Add"]);
            }
        } else
            header('Location: /admin/users');
    }

    public function editAction()
    {
        if (!empty($this->route_params['id'])) {
            $user = UsersModel::find($this->route_params['id']);
            if (!empty($user))
                View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Edit"]);
            else
                header('Location: /admin/users');
        } else
            header('Location: /admin/users');
    }

    public function editDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['UserId'];
            $user = $_POST;
            $email = "'" . $_POST['Email'] . "'";
            $idDulicateEmail = UsersModel::find($email, 'Email')['UserId'];
            if (!isset($idDulicateEmail) || $idDulicateEmail == $id) {
                if (UsersModel::update($id, $user)) {
                    $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Updated Successfully'];
                    header('Location: /admin/users');
                } else {
                    $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'User not Updated'];
                    View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Edit"]);
                }
            } else {
                $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'Email Already Exist!'];
                View::renderTemplate('Admin/Users/form', ['user' => $user, 'type' => "Edit"]);
            }
        } else
            header('Location: /admin/users');
    }

    public function deleteDataAction()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            if (UsersModel::delete($id))
                $_SESSION['error'] = ['class' => 'alert alert-success', 'msg' => 'User Deleted'];
            else
                $_SESSION['error'] = ['class' => 'alert alert-danger', 'msg' => 'User not Deleted'];
        }
        header('Location: /admin/users');
    }
}
