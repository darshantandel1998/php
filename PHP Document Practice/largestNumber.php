<?php
function largestNumber($arr)
{
    $large = $arr[0];
    foreach ($arr as $value) {
        if($value > $large)
            $large = $value;
    }
    return $large;
}

$str = "";
if (isset($_POST['str']))
    $str = $_POST['str'];
?>

<form method="POST">
    <input type="text" name="str" value="<?php echo $str; ?>">
    <button type="submit">Find largest Number</button>
</form>

<?php
if (isset($_POST['str'])) {
    $arr = explode(" ", trim($str));
    $largeNumber = largestNumber($arr);
    echo "Largest Number is " . $largeNumber;
}
?>