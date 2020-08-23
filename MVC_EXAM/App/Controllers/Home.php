<?php

namespace App\Controllers;

use App\Config;
use App\Models\AddressModel;
use App\Models\UserModel;
use Core\View;

class Home extends \Core\Controller
{
    public function loginAction()
    {
        if (isset($_SESSION['isUserLogin']) && $_SESSION['isUserLogin'] == true)
            $this->redirect('user/services');
        View::renderTemplate('Home/login', ['type' => 'User']);
    }

    public function logincheckAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Email']) && isset($_POST['Password'])) {
            $user = UserModel::find($_POST['Email'], 'Email');
            if ($user['Email'] == $_POST['Email'] && $user['Password'] == md5($_POST['Password'])) {
                $_SESSION['isUserLogin'] = $user['UserId'];
                $this->redirect('user/services');
            } else {
                $this->alert('Email or Password is wrong', 'alert alert-danger');
                View::renderTemplate('Home/login', ['type' => 'User', 'user' => $_POST]);
            }
        } else
            $this->redirect('login');
    }

    public function logoutAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            unset($_SESSION['isUserLogin']);
        }
        $this->redirect('login');
    }

    public function registerAction()
    {
        View::renderTemplate('Home/register', ['type' => "Register"]);
    }

    public function registerDataAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['user'];
            $userAddress = $_POST['address'];
            $flag = true;
            if (UserModel::find($user['Email'], 'Email')) {
                $this->alert('Email already exist.', 'alert alert-danger');
                $flag = false;
            } else if ($user['Password'] != $_POST['rePassword']) {
                $this->alert('Password not matched.', 'alert alert-danger');
                $flag = false;
            }
            if ($flag) {
                UserModel::beginTransaction();
                $user = UserModel::prepareDataInsert($user);
                if ($id = UserModel::insert($user)) {
                    $userAddress['UserId'] = $id;
                    if (AddressModel::insert($userAddress)) {
                        userModel::commit();
                        $this->alert('User Inserted.', 'alert alert-success');
                        $this->redirect('login');
                    } else {
                        UserModel::rollBack();
                        $this->alert('User not Inserted.', 'alert alert-danger');
                        $flag = false;
                    }
                } else {
                    UserModel::rollBack();
                    $this->alert('User not Inserted.', 'alert alert-danger');
                    $flag = false;
                }
            }
            if ($flag == false) {
                View::renderTemplate('Home/register', ['type' => "Register", 'user' => $user, 'userAddress' => $userAddress]);
            }
        } else
            $this->redirect('register');
    }

    public function adminLoginAction()
    {
        if (isset($_SESSION['isAdminLogin']) && $_SESSION['isAdminLogin'] == true)
            $this->redirect('admin/services');
        View::renderTemplate('Home/login', ['type' => 'Admin']);
    }

    public function adminLoginCheckAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Email']) && isset($_POST['Password'])) {
            if (Config::ADMIN_EMAIL == $_POST['Email'] && Config::ADMIN_PASSWORD == md5($_POST['Password'])) {
                $_SESSION['isAdminLogin'] = true;
                $this->redirect('admin/services');
            } else {
                $this->alert('Email or Password is wrong', 'alert alert-danger');
                View::renderTemplate('Home/login', ['type' => 'Admin', 'user' => $_POST]);
            }
        } else
            $this->redirect('adminLogin');
    }

    public function adminLogoutAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            unset($_SESSION['isAdminLogin']);
        }
        $this->redirect('adminLogin');
    }
}
