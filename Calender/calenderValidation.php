<?php
function validation()
{
    $errMsg['startingMonthYear'] = (empty(getValue('startingMonthYear')))
        ? "Starting month is empty"
        : "";
    $errMsg['endingMonthYear'] = ((!empty(getValue('endingMonthYear')))
        && (strtotime(getValue('startingMonthYear')) > strtotime(getValue('endingMonthYear'))))
        ? "Ending month is smaller"
        : "";
    $errMsg['image'] = "";
    if (!empty($_FILES['image']['name'])) {
        $file_size = $_FILES['image']['size'];
        $file_expload = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($file_expload));
        $extensions = array("jpeg", "jpg", "png");
        if ($file_size > 2097152)
            $errMsg['image'] = "file size must be excately 2 MB";
        if (!in_array($file_ext, $extensions))
            $errMsg['image'] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    return $errMsg;
}

function validate()
{
    foreach (validation() as $errMsg) {
        if ($errMsg != "")
            return false;
    }
    return true;
}
