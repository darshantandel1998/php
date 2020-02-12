<?php
$host_name = $_SERVER['HTTP_HOST'];
$image_path = $host_name . '/images';

$ip_address = $_SERVER['REMOTE_ADDR'];
$block_ip = array('::1', '127.0.0.1', '192.168.1.1');
foreach ($block_ip as $ip) {
    if ($ip == $ip_address)
        die("Your IP address " . $ip_address . " has been blocked.");
}
?>