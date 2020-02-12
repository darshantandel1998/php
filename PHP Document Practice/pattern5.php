<?php
function pattern($number)
{
    echo "<table>";
    for ($i = 0; $i < $number; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++)
            echo "<td>" . strval(($i + 1) + ($number * $j)) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Generate Pattern</button>
</form>

<?php
if (isset($_POST['number']))
    pattern($number);
?>