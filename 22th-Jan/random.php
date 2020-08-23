<?php
$randomNumber = rand();
$max_randomNumber = getrandmax();
echo "Random Number: " . $randomNumber . "<br>";
echo "Maximum Random Number: " . $max_randomNumber . "<br>";
echo "OTP: " . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT) . "<br>";
?>

<hr>
<form method="POST">
    <button type="submit">Generate 4 Digit OTP</button>
</form>