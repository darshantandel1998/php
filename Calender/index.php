<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calender</title>
    <link rel='stylesheet' type='text/css' href='calenderStyle.css'>
</head>

<body>
    <?php require_once "calenderApp.php"; ?>

    <form method="POST" enctype="multipart/form-data">
        Starting Month:
        <input type="month" name="startingMonthYear" value="<?php echo getValue('startingMonthYear'); ?>" />
        <?php echo validation()['startingMonthYear']; ?><br>
        Ending Month:
        <input type="month" name="endingMonthYear" value="<?php echo getValue('endingMonthYear'); ?>" />
        <?php echo validation()['endingMonthYear']; ?><br>
        Image:
        <input type="file" name="image">
        <?php echo validation()['image']; ?><br>
        <button type="submit" name="submit">Generate Calender</button>&nbsp;
        <button type="submit" name="sendMail">Send Mail</button>
    </form>

    <?php sendMail(); ?>
    <?php calender(); ?>
</body>

</html>