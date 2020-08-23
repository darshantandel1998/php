<?php
echo "Reporting 0";
error_reporting(0);
echo $a;
echo "<br />";

echo "Reporting E_ALL";
error_reporting(E_ALL);
echo $a;
echo "<br />";

echo "Reporting E_NOTICE";
error_reporting(E_NOTICE);
echo $a;
echo "<br />";
?>