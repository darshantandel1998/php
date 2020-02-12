<?php
function pattern($number)
{
    echo "<table>";
    for ($i = 0; $i < $number; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $number; $j++) {
            if ($i == 0 || $i == $number - 1 || $j == 0 || $j == $number - 1)
                echo "<td>*</td>";
            else
                echo "<td></td>";
        }
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