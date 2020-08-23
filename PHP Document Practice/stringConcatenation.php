<?php
function concatenate($str1, $str2)
{
    $len = min(strlen($str1), strlen($str2));
    $str = "";
    for($i = 0; $i < $len; $i++)
        $str .= $str1[$i] . $str2[$i]; 
    $str .= substr($str1, $len);
    $str .= substr($str2, $len);
    return $str;
}

$str1 = "";
$str2 = "";
if (isset($_POST['str1']) && isset($_POST['str2'])) {
    $str1 = $_POST['str1'];
    $str2 = $_POST['str2'];
}
?>

<form method="POST">
    <input type="text" name="str1" value="<?php echo $str1; ?>">
    <input type="text" name="str2" value="<?php echo $str2; ?>">
    <button type="submit">Concatenate</button>
</form>

<?php
if (isset($_POST['str1']) && isset($_POST['str2'])) {
    $mergeStr = concatenate($str1, $str2);
    echo "Concatenate string is: " . $mergeStr;
}
?>