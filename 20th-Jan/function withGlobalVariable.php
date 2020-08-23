<?php
$globalVar = "Darshan Tandel";

function displayName() {
    global $globalVar;
    echo "Name: " . $globalVar . "<br>";   
}

displayName();
?>