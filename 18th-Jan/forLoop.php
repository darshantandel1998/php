<h1>Echo 0 to 100 numbers</h1>
<?php 
$lastNumber = 100;
for ($i = 0; $i <= $lastNumber; $i++)
    echo $i . '<br>';
?>

<h1>Factorial of 8</h1>
<?php
$number = 8;
$factorial = 1;
for ($i = 1; $i <= $number; $i++)
    $factorial *= $i;
echo $factorial;
?>

<h1>Sum of first 10 numbers</h1>
<?php
$sum = 0;
for ($i = 0; $i <= 10; $i++)
    $sum += $i;
echo $sum;
?>

<h1>Sum of even numbers between 0 to 10</h1>
<?php
$sum = 0;
for ($i = 0; $i <= 10; $i++) {
    if (($i % 2) == 0)
        $sum += $i;
}
echo $sum;
?>

<h1>Echo odd number between 1 to 100</h1>
<?php
$lastNumber = 100;
for ($i = 1; $i <= $lastNumber; $i++) {
    if(($i % 2) != 0)
        echo $i . '<br>';
}
?>