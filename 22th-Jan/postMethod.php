<?php
$username = "";
$password = "";
$username_match = "darshantandel1998";
$password_match = "studio@123";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        if ($username == $username_match && $password == $password_match)
            echo "Successfully Login.";
        else
            echo "Username or Password is incorrect.";
    } else
        echo "Enter Username and Password.";
}
?>

<hr>
<form method="POST">
    Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br>
    Password: <input type="password" name="password" value="<?php echo $password; ?>" /><br>
    <button type="submit" name="submit">Login</button>
</form>