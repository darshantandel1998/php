<?php

namespace Core;

use App\Config;

class App
{
    public static function run()
    {
        session_name(Config::APP_NAME);
        session_start();
        
        error_reporting(E_ALL);
        set_error_handler('Core\Error::errorHandler');
        set_exception_handler('Core\Error::exceptionHandler');
    }
}
