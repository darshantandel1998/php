<?php
function pattern($number)
{
    echo "<table>";
    for ($i = $number; $i > 0; $i--) {
        echo "<tr>";
        for ($j = 1; $j <= $i; $j++)
            echo "<td>" . $j . "</td>";
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