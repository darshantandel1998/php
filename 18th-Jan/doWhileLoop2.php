<h1>Factorial of 8</h1>
<?php
$number = 8;
$factorial = 1;
$i = 1;
do {
    $factorial *= $i++;
} while ($i <= $number);
echo $factorial;
?>