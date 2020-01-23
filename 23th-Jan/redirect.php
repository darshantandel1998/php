<?php ob_start(); ?>

<h1>Page Title</h1>

<?php
header('Content-Type: text/html');
$redirect_page = "https://www.google.com";
$redirect = true;
if ($redirect) {
    header('Location: ' . $redirect_page);
}

ob_end_flush();
?>