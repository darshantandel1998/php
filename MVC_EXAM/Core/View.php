<?php

namespace Core;

use App\Config;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = "../App/Views/$view.html.twig";
        if (is_readable($file))
            require $file;
        else
            throw new \Exception("'$file' not found");
        unset($_SESSION['alert']);
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
            $function = new \Twig\TwigFunction('url', function($path) {
                return Config::BASE_DIR . $path;
            });
            $twig->addFunction($function);
            $twig->addGlobal('GET', $_GET);
            $twig->addGlobal('POST', $_POST);
            $twig->addGlobal('SESSION', $_SESSION);
            $twig->addGlobal('COOKIE', $_COOKIE);
            $twig->addGlobal('base_url', Config::BASE_DIR);
        }
        $template .= '.html.twig';
        echo $twig->render($template, $args);
        unset($_SESSION['alert']);
    }
}
