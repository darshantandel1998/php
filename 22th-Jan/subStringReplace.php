<?php
$text = "";
$search = "";
$replace = "";
$offset = 0;
if (isset($_POST['text']) && isset($_POST['search']) && isset($_POST['replace'])) {
    $text = $_POST['text'];
    $search = $_POST['search'];
    $replace = $_POST['replace'];
    $search_length = strlen($search);
    if (!empty($text) && !empty($search) && !empty($replace)) {
        while ($strpos = strpos($text, $search, $offset)) {
            $offset = $strpos + $search_length;
            $text = substr_replace($text, $replace, $strpos, $search_length);
        }
    }
}
?>

<hr>
<form method="POST">
    <textarea name="text" rows="5" cols="30"><?php echo $text; ?></textarea><br><br>
    Search: <input type="text" name="search" value="<?php echo $search; ?>" /><br><br>
    Replace: <input type="text" name="replace" value="<?php echo $replace; ?>" /><br><br>
    <button type="submit">Find and Replace</button>
</form>