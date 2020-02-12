<?php
function isPrime($number)
{
    if ($number == 0 || $number == 1)
        return false;
    $flag = 1;
    for ($i = 2; $i <= floor($number / 2); $i++) {
        if ($number % $i == 0) {
            $flag = 0;
            break;
        }
    }
    return $flag;
}

if (isset($_POST['number']))
    $number = $_POST['number'];
?>

<form method="POST">
    <input type="number" name="number" value="<?php echo $number; ?>">
    <button type="submit">Check Prime</button>
</form>

<?php
if (isset($_POST['number'])) {
    if (isPrime($number))
        echo $number . " is Prime Number";
    else
        echo $number . " is not Prime Number";
}
?>