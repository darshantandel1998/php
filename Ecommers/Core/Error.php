<?php

namespace Core;

use \App\Config;
use \Core\View;

class Error
{
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0)
            throw new \ErrorException($message, 0, $level, $file, $line);
    }

    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code != 404)
            $code = 500;
        http_response_code($code);

        if (Config::SHOW_ERRORS) {
            $exception = [
                'class' => get_class($exception),
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ];
            View::renderTemplate('Error/error', ['exception' => $exception]);
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            $message = "\nUncaught exception: '" . get_class($exception) . "'";
            $message .= "\nMessage: '" . $exception->getMessage() . "'";
            $message .= "\nStack trace: " . $exception->getTraceAsString();
            $message .= "\nThrow in '" . $exception->getFile() . "' on line " . $exception->getLine();
            $message .= "\n\n";
            error_log($message);
            View::renderTemplate("Error/$code");
        }
    }
}
