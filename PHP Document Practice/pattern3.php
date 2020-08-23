<?php
function pattern($number)
{
    echo "<table>";
    for ($i = 0; $i < $number; $i++) {
        echo "<tr>";
        echo str_repeat("<td>*</td>", $i+1);
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