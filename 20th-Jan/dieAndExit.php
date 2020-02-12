<?php 
/*
if (Database Not Connect)
    die ("not connect to the database");
echo 'connected successfully';

die () and exit() same.
*/

$name = 'Darshan Tandel';
$age = 17;
echo 'Hello I\'m ' . $name . ' and my age is ' . $age . '<br>'; 

if ($age < 18)
    die("Not allow to visit the site.");
echo "Welcome to site";
?>