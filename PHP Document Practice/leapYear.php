<?php
function isLeapYear($year)
{
    if ($year % 400 == 0 || ($year % 4 == 0 && !($year % 100 == 0)))
        return true;
    return false;
}

if (isset($_POST['year']))
    $year = $_POST['year'];
?>

<form method="POST">
    <input type="number" name="year" value="<?php echo $year; ?>">
    <button type="submit">Check Leap Year</button>
</form>

<?php
if (isset($_POST['year'])) {
    if (isLeapYear($year))
        echo $year . " is Leap Year";
    else
        echo $year . " is not Leap Year";
}
?>