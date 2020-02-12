<?php
function hcf($number1, $number2)
{
    if ($number2 == 0)
        return $number1;
    if ($number1 == 0)
        return $number2;
    if ($number1 == $number2)
        return $number1;
    if ($number1 > $number2)
        return hcf($number1 - $number2, $number2);
    else
        return hcf($number1, $number2 - $number1);
}
function lcm($number1, $number2)
{
    return (($number1 * $number2) / hcf($number1, $number2));
}

if (isset($_POST['number1']) && isset($_POST['number2'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
}
?>

<form method="POST">
    <input type="number" name="number1" value="<?php echo $number1; ?>">
    <input type="number" name="number2" value="<?php echo $number2; ?>">
    <button type="submit">Find LCM</button>
</form>

<?php
if (isset($_POST['number1']) && isset($_POST['number2'])) {
    $lcm = lcm($number1, $number2);
    echo $number1 . " and " . $number2 . " LCM is " . $lcm;
}
?>