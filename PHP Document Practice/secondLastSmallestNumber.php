<?php
function secondlastSmallestNumber($arr)
{
    sort($arr);
    if (count($arr) == 1)
        return $arr[0]; 
    return $arr[1];
}

$str = "";
if (isset($_POST['str']))
    $str = $_POST['str'];
?>

<form method="POST">
    <input type="text" name="str" value="<?php echo $str; ?>">
    <button type="submit">Find Second Last Smallest Number</button>
</form>

<?php
if (isset($_POST['str'])) {
    $arr = explode(" ", trim($str));
    $secondlastSmallestNumber = secondlastSmallestNumber($arr);
    echo "Second Last Smallest Number is " . $secondlastSmallestNumber;
}
?>