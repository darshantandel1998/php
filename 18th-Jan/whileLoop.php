<h1>Echo 0 to 100 numbers</h1>
<?php 
$i = 0;
$lastNumber = 100;
while($i <= $lastNumber)
    echo $i++ . '<br>';
?>

<h1>Factorial of 8</h1>
<?php
$number = 8;
$factorial = 1;
$i = 1;
while ($i <= $number)
    $factorial *= $i++;
echo $factorial;
?>

<h1>Sum of first 10 numbers</h1>
<?php
$i = 0;
$sum = 0;
while ($i <= 10)
    $sum += $i++;
echo $sum;
?>

<h1>Sum of even numbers between 0 to 10</h1>
<?php
$i = 0;
$sum = 0;
while ($i <= 10) {
    if (($i % 2) == 0)
        $sum += $i;
    $i++;
}
echo $sum;
?>

<h1>Echo odd number between 1 to 100</h1>
<?php
$i = 1;
$lastNumber = 100;
while ($i <= $lastNumber) {
    if(($i % 2) != 0)
        echo $i . '<br>';
    $i++;
}
?>