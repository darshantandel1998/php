<?php
function factors($number)
{
    $factor = "";
    for ($i = 1; $i <= $number; $i++)
        if ($number % $i == 0)
            $factor .= $i . ", ";
    return substr($factor, 0, strlen($factor)-2);
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Find Factors</button>
</form>

<?php
if (isset($_POST['number'])) {
    $factors = factors($number);
    echo $number . " Factor is " . $factors;
}
?>