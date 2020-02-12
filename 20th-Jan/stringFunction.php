<?php
$string = 'Darshan Tandel - Computer Engineer';
echo 'original string: ' . $string . '<br><br>';
echo 'addcslashes: ' . addcslashes($string, '/C/') . '<br><br>';
echo 'str_ireplace: ' . str_ireplace('Computer', 'Comp', $string) . '<br><br>';
echo 'str_pad: ' . str_pad($string, 40, '!!') . '<br><br>';
echo 'str_repeat: ' . str_repeat($string . ' ', 2) . '<br><br>';
echo 'str_shuffle: ' . str_shuffle($string) . '<br><br>';
echo 'str_word_count: ' . str_word_count($string) . '<br><br>';
echo 'strchr: ' . strchr($string, '-') . '<br><br>';
echo 'strlen: ' . strlen($string) . '<br><br>';
echo 'strrev: ' . strrev($string) . '<br><br>';
echo 'strtoupper: ' . strtoupper($string) . '<br><br>';
echo 'strtolower: ' . strtolower($string) . '<br><br>';
echo 'substr: ' . substr($string, 7) . '<br><br>';
echo 'wordwrap: ' . wordwrap($string, 20, '"') . '<br><br>';
echo 'str_split: <br>';
print_r(str_split($string, 5));

echo '<br><br><br>';

$string2 = 'Hello';
echo 'original string 1: ' . $string . '<br><br>';
echo 'original string 2: ' . $string2 . '<br><br>';
echo 'strcasecmp: ' . strcasecmp($string, $string2) . '<br><br>';
?>