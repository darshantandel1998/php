<style>
    table {
        border-collapse: collapse;
    }
    table, tr, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>

<?php
function numberTable($number)
{
    echo "<table>";
    for ($i = 1; $i <= 10; $i++)
        echo "<tr><td>" . $number . " x " . $i . " = " . ($number * $i) . "</td></tr>";
    echo "</table>";
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Generate Table</button>
</form>

<?php
if (isset($_POST['number']))
    numberTable($number);
?>