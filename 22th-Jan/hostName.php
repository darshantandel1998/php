<?php
require 'include/config.inc.php';

$img = '<img src="' . $image_path . '/logo.jpg" />';
echo htmlentities($img);
?>