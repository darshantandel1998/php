<?php
function smallestNumber($arr)
{
    sort($arr);
    return $arr[0];
}

$str = "";
if (isset($_POST['str']))
    $str = $_POST['str'];
?>

<form method="POST">
    <input type="text" name="str" value="<?php echo $str; ?>">
    <button type="submit">Find Smallest Number</button>
</form>

<?php
if (isset($_POST['str'])) {
    $arr = explode(" ", trim($str));
    $smallestNumber = smallestNumber($arr);
    echo "Smallest Number is " . $smallestNumber;
}
?>