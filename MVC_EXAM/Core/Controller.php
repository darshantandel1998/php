<?php

namespace Core;

use App\Config;

abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($name, $args)
    {
        $method = $name . 'Action';
        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else
            throw new \Exception("Method '$method' (in controller '" . get_class($this) . "') not found");
    }

    protected function before()
    {
        if (array_key_exists('namespace', $this->route_params)) {
            $namesapce = explode("\\", $this->route_params['namespace'], 2)[0];
            if ($namespace = "Admin") {
                if (isset($_SESSION['isAdminLogin']))
                    return $_SESSION['isAdminLogin'] == 'true' ? true : false;
                else {
                    $this->redirect('');
                    return false;
                }
            }
            if ($namespace = "User") {
                if (isset($_SESSION['isUserLogin']))
                    return $_SESSION['isUserLogin'] == 'true' ? true : false;
                else {
                    $this->redirect('');
                    return false;
                }
            }
        }
    }

    protected function after()
    {
    }

    protected function redirect($path = '')
    {
        header('Location: ' . Config::BASE_DIR . $path);
    }

    protected function alert($msg, $class = '')
    {
        $_SESSION['alert'] = ['msg' => $msg, 'class' => $class];
    }
}
