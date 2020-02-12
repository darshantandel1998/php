<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cookie</title>
</head>

<body>
    <?php
    if (isset($_POST['setCookie'])) {
        setcookie('Name', $_POST['name'], time()+10);
        header('Location: '.$_SERVER['PHP_SELF']);  
    }
    if (isset($_POST['unsetCookie'])) {
        setcookie('Name', "", time()-10);
        header('Location: '.$_SERVER['PHP_SELF']);  
    }
    ?>

    <form action="" method="POST">
        Name:
        <input type="text" name="name"><br>
        <button type='submit' name='setCookie'>Set Cookie</button>&nbsp;
        <button type='submit' name='unsetCookie'>Unset Cookie</button>
    </form>

    <?php
    if (isset($_COOKIE)) {
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
    }
    ?>
</body>

</html>