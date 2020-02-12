<?php
session_name('Calender');
session_start();

function getValue($fieldName)
{
    return isset($_POST[$fieldName])
        ? $_POST[$fieldName]
        : getSessionValue($fieldName);
}

function getSessionValue($fieldName)
{
    return isset($_SESSION[$fieldName])
        ? $_SESSION[$fieldName]
        : "";
}

function setSessionValues()
{
    if (isset($_POST['submit']) || isset($_POST['sendMail'])) {
        $_SESSION['startingMonthYear'] = $_POST['startingMonthYear'];
        $_SESSION['endingMonthYear'] = $_POST['endingMonthYear'];
    }
}
setSessionValues();

function getImagePath()
{
    $directory = "images";
    return isset($_SESSION['imageName'])
        ? 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . '/' . $directory . '/' . $_SESSION['imageName']
        : "";
}

function storeImage()
{
    $directory = "images";
    if (!empty($_FILES['image']['name']) && validate()) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp, $directory . '/' . $file_name);
        $_SESSION['imageName'] = $file_name;
    }
}
storeImage();
