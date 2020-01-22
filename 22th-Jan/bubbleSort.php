<?php
function bubbleSort($arr)
{
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

$str = "";
if (isset($_POST['str']))
    $str = $_POST['str'];
?>

<form method="POST">
    <input type="text" name="str" value="<?php echo $str; ?>">
    <button type="submit">Bubble Sort</button>
</form>

<?php
if (isset($_POST['str'])) {
    $arr = explode(" ", trim($str));
    $sortedArr = bubbleSort($arr);
    print_r($arr);
    echo "<br>";
    print_r($sortedArr);
}
?>