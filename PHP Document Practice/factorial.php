<?php
function factorial($number)
{
    $factorial = 1;
    while ($number > 0) {
        $factorial *= $number;
        $number--;
    }
    return $factorial;
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Find Factorial</button>
</form>

<?php
if (isset($_POST['number'])) {
    $factorial = factorial($number);
    echo $number . "! = " . $factorial;
}
?>