<?php
function reverseNumber($number)
{
    $sum = 0;
    $temp = $number;
    while ($temp != 0) {
        $r = $temp % 10;
        $sum = ($sum * 10) + $r;
        $temp = floor($temp / 10);
    }
    return $sum;
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Reverse Number</button>
</form>

<?php
if (isset($_POST['number'])) {
    $reverseNumber = reverseNumber($number);
    echo $number . " Reverse Number is " . $reverseNumber;
}
?>