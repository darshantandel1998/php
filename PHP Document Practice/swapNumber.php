<?php
function swapNumber($number1, $number2)
{
    global $number1, $number2;
    $temp = $number1;
    $number1 = $number2;
    $number2 = $temp;
}

if (isset($_POST['number1']) && isset($_POST['number2'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
}
?>

<form method="POST">
    <input type="number" name="number1" value="<?php echo $number1; ?>">
    <input type="number" name="number2" value="<?php echo $number2; ?>">
    <button type="submit">Swap Number</button>
</form>

<?php
if (isset($_POST['number1']) && isset($_POST['number2'])) {
    swapNumber($number1, $number2);
    echo "Number 1: " . $number1;
    echo "<br>";
    echo "Number 2: " . $number2;
}
?>