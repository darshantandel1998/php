<?php
$browser = $_SERVER['HTTP_USER_AGENT'];

$browser = get_browser(null, true);
$browser = strtolower($browser['browser']);

if ($browser != 'chrome')
    die("You are not Using Google Chrome. Please use Chrome Browser.");
else
    echo "Welcome to Google Chrome.";
?>