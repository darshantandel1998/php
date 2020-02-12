<h1>Display Day</h1>
<?php 
$day = 0;
switch ($day) {
    case 0:
        echo "Sunday";
        break;
    case 1:
        echo "Monday";
        break;    
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "Wednesday";
        break;
    case 4:
        echo "Thursday";
        break;
    case 5:
        echo "Friday";
        break;
    case 6:
        echo "Saturday";
        break;
    default:
        echo "Please choose between 0 to 6";
}
?>

<h1>Arithmetic Operation: add 50 and 20</h1>
<?php 
$operator = '+';
$number1 = 50;
$number2 = 20;
switch ($operator) {
    case '+':
        echo "Sum = " . ($number1 + $number2);
        break;
    case '-':
        echo "Subtraction = " . ($number1 - $number2);
        break;
    case '*':
        echo "Multiplication = " . ($number1 * $number2);
        break;
    case '/':
        echo "Division = " . ($number1 / $number2);
        break;
    default:
        echo "Select from +, -, *, /";
}
?>

<h1>Condition using Switch</h1>
<?php
$number = 100;
switch (true) {
    case ($number < 0):
        echo $number . ' is negative';
        break;
    case ($number == 0):
        echo $number . ' is Zero';
        break;
    case ($number > 0):
        echo $number . ' is positive';
        break;
    default:
        echo 'Enter a valid number.';
}
?>