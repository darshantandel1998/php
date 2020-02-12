<?php
$text = "";
$find = array('darshan', 'tandel');
$replace = array('D*****n', 'T****l');
if (isset($_POST['text']) && !empty($_POST['text'])) {
    $text = $_POST['text'];
    echo $strReplace = str_ireplace($find, $replace, $text);
}
?>

<hr>
<form method="POST">
    <textarea name="text" rows="5" cols="30"><?php echo $text; ?></textarea><br><br>
    <button type="submit">Replace</button>
</form>