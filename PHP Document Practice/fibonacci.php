<?php
function fibonacci($number)
{
    $firstNum = 0;
    $secondNum = 1;
    if ($number >= 1)
        echo $firstNum . "<br>";
    if ($number >= 2)
        echo $secondNum . "<br>";
    if ($number >= 3) {
        for ($i = 3; $i <= $number; $i++) {
            $thirdNum = $firstNum + $secondNum;
            echo $thirdNum . "<br>";
            $firstNum = $secondNum;
            $secondNum = $thirdNum;
        }
    }
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Find Fibonacci</button>
</form>

<?php
if (isset($_POST['number']))
    fibonacci($number);
?>