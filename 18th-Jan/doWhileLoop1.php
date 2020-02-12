<h1>Echo 0 to 100 numbers</h1>
<?php 
$i = 0;
$lastNumber = 100;
do {
    echo $i++ . '<br>';
} while($i <= $lastNumber);
?>