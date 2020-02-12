<!DOCTYPE html>
<html lang="en">

<head>
    <title>Session</title>
</head>

<body>
    <?php
    session_name('SessionDemo');
    session_start();
    if (isset($_POST['setSession']))
        $_SESSION = $_POST;
    if (isset($_POST['unsetSession']))
        unset($_SESSION['name']);
    ?>

    <form method="POST">
        Name:
        <input type="text" name="name"><br>
        <button type='submit' name='setSession'>Set Session</button>&nbsp;
        <button type='submit' name='unsetSession'>Unset Session</button>
    </form>

    <?php
    if (isset($_SESSION)) {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
    ?>
</body>

</html>