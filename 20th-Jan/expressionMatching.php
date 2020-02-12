<?php
if (preg_match("/Darshan Tandel/i", "Hello I'm Darshan Tandel")) {
    echo "Found";
} else {
    echo "Not found";
}
echo "<br><br>";

if (preg_match("/tandel/", "Hello I'm Darshan Tandel")) {
    echo "Found";
} else {
    echo "Not found";
}
?>