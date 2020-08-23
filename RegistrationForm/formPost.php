<?php
session_name('RegistrationForm');
session_start();

function getValue($sectionName, $fieldName, $returnType = "")
{
    return isset($_POST[$sectionName][$fieldName])
        ? $_POST[$sectionName][$fieldName]
        : getSessionValue($sectionName, $fieldName, $returnType);
}

function getSessionValue($sectionName, $fieldName, $returnType)
{
    return isset($_SESSION[$sectionName][$fieldName])
        ? $_SESSION[$sectionName][$fieldName]
        : $returnType;
}

function setSessionValues($sectionName)
{
    return isset($_POST[$sectionName])
        ? $_SESSION[$sectionName] = $_POST[$sectionName]
        : [];
}

function validate($sectionName, $fieldName, $type = "")
{
    if (isset($_POST['submit'])) {
        $value = getValue($sectionName, $fieldName);
        switch ($type) {
            case "name":
            case "country":
                return preg_match("/^([A-Za-z]+)$/", $value) ? true : false;
            case "email":
                return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : false;
            case "password":
                return $value == getValue($sectionName, $type) ? true : false;
            case "phone":
                return preg_match("/^[6-9][0-9]{9}$/", $value) ? true : false;
            case "address":
                return preg_match("/[A-Za-z0-9]+$/", $value) ? true : false;
            case "postalCode":
                return preg_match("/^[0-9]{6}$/", $value) ? true : false;
            case "paragraph":
                return preg_match("/[^\r\n]+((\r|\n|\r\n)[^\r\n]+)*/", $value) ? true : false;
            case "pdf":
                $file_expload = explode('.', $_FILES[$sectionName]['name'][$fieldName]);
                return (strtolower(end($file_expload)) == $type) ? true : false;
            default:
                return !empty($value) ? true : false;
        }
    } else
        return true;
}

setSessionValues('account');
setSessionValues('address');
setSessionValues('other');
