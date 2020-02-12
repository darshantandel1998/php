<?php
$number = "50";
if (is_numeric($number)) {
    if ($number < 18)
        echo "Below 18.";
    else if ($number >= 18 && $number <= 50)
        echo "Between 18 to 50.";
    else if ($number > 50)
        echo "Above 50.";
} else
    echo "Not a Number.";

if (true)
    echo "Always True.";
else
    echo "Never Run.";

if (0)
    echo "Never Run.";
else
    echo "Always Run.";

$cases = [
    "",
    "0",
    "1",
    "01",
    "abc",
    "true",
    "false",
    0,
    0.1,
    1,
    1.1,
    -42,
    "NAN",
    (float) "NAN",
    NAN,
    null,
    true,
    false,
];
foreach ($cases as $case) {
    echo $case . ' ';
    if ($case == true)
        echo "true";
    else
        echo "false";
    echo '<br>';
}
?>