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
function multiplicationTable($number1, $number2)
{
    echo "<table>";
    for ($i = 1; $i <= $number1; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $number2; $j++) {
            echo "<td>" . $i . " * " . $j . " = " . ($i * $j) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST['number1']) && isset($_POST['number2'])) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
}
?>

<form method="POST">
    <input type="number" name="number1" value="<?php echo $number1; ?>">
    <input type="number" name="number2" value="<?php echo $number2; ?>">
    <button type="submit">Show Multiplication Table</button>
</form>

<?php
if (isset($_POST['number1']) && isset($_POST['number2']))
    multiplicationTable($number1, $number2);
?>