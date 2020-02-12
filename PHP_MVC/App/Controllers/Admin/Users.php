<?php

namespace App\Controllers\Admin;

use \Core\View;
use \App\Models\Admin\UsersModel;

class Users extends \Core\Controller
{
    public function before()
    {
        echo "Users authenticated<br>";
        return true;
    }

    public function after()
    {
        echo "<br>Users task end";
    }

    public function indexAction()
    {
        $users = UsersModel::getAll();
        View::renderTemplate('Admin/Users/index', ['users' => $users]);
    }
}
