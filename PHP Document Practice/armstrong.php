<?php
function isArmstrong($number)
{
    $lengthOfNumber = strlen(strval($number));
    $sum = 0;
    $temp = $number;
    while ($temp != 0) {
        $r = $temp % 10;
        $sum += pow($r, $lengthOfNumber);
        $temp = floor($temp / 10);
    }
    if ($number == $sum)
        return true;
    else
        return false;
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Check Armstrong</button>
</form>

<?php
if (isset($_POST['number'])) {
    if (isArmstrong($number))
        echo $number . " is Armstrong Number";
    else
        echo $number . " is not Armstrong Number";
}
?>