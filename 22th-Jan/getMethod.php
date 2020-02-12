<?php
$day = "";
$month = "";
$year = "";

if (isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])) {
    $day = $_GET['day'];
    $month = $_GET['month'];
    $year = $_GET['year'];
    if (!empty($day) && !empty($month) && !empty($year)) {
        echo $day . " " . $month . " " . $year;
    } else {
        echo "Enter all fields.";
    }
}
?>

<hr>
<form method="GET">
    Day: <input type="text" name="day" value="<?php echo $day; ?>" /><br>
    Month: <input type="text" name="month" value="<?php echo $month; ?>" /><br>
    Year: <input type="text" name="year" value="<?php echo $year; ?>" /><br>
    <button type="submit" name="submit">Submit</button>
</form>