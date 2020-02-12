<?php
$time = time();
$actual_time = date("r", time());
$modified_time1 = date("r", strtotime("+1 day 1 hour 1 minute 1 second"));
$day = 1;
$hour = 1;
$minute = 1;
$second = 1;
$modified_time2 = date("r", time() + (($day * 3600 * 24) + ($hour * 3600) + ($minute * 60) + $second));

echo "Int Time: " . $time . "<br>";
echo "Time: " . $actual_time . "<br>";
echo "Time Modified 1: " . $modified_time1 . "<br>";
echo "Time Modified 2: " . $modified_time2 . "<br>";
?>
