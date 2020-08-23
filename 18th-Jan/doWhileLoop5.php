<h1>Echo odd number between 1 to 100</h1>
<?php
$i = 1;
$lastNumber = 100;
do {
    if(($i % 2) != 0)
        echo $i . '<br>';
    $i++;
} while ($i <= $lastNumber);
?>