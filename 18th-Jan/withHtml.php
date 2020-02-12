<?php
$name = "Darshan";
$checkbox = "checked";
$date = "1998-01-06";
?>

<input type="checkbox" <?= $checkbox ?>>
<input type="text" value="<?= $name ?>">
<input type="date" value="<?= $date ?>"><br><br>

<?php
print '<input type="text" placeholder="Name" value="Darshan Tandel">';
echo '<input type="radio" name="gender" value="Male"> Male&nbsp;';
echo '<input type="radio" name="gender" value="Female"> female<br><br>';
?>

<?php
echo '<textarea name="address"></textarea><br><br>';
?>

<?php
echo '<select name="city">
        <option value="Navsari">Navsari</option>
        <option value="Surat">Surat</option>
        <option value="Ahmedabad">Ahmedabad</option>
    </select><br><br>';
?>

<?php
echo '<h2>Form</h2>
    <form id="myForm">
        <input type="text" placeholder="Name">
        <button type="submit">Submit</button>
    </form>';
?>