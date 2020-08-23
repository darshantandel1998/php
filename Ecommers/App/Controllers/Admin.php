<?php

namespace App\Controllers;

use App\Config;
use \Core\View;

class Admin extends \Core\Controller
{
    public function loginAction()
    {
        if (isset($_SESSION['isAdminLogin']) && $_SESSION['isAdminLogin'] == true)
            $this->redirect('admin/dashboard');
        View::renderTemplate('Home/login');
    }

    public function loginCheckAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Email']) && isset($_POST['Password'])) {
            if (Config::ADMIN_EMAIL == $_POST['Email'] && Config::ADMIN_PASSWORD == md5($_POST['Password'])) {
                $_SESSION['isAdminLogin'] = true;
                $this->redirect('admin/dashboard');
            } else {
                $this->alert('Email or Password is wrong.', 'alert alert-danger');
                View::renderTemplate('Home/login', ['user' => $_POST]);
            }
        } else
            $this->redirect('admin/login');
    }

    public function logoutAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            unset($_SESSION['isAdminLogin']);
        }
        $this->redirect('admin/login');
    }
}
