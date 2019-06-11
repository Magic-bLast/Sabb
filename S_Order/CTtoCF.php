<?php
    $tableNum =  $_POST['tableNumber'];
    session_start();
    $_SESSION['tableNumber']=$tableNum;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Please Wait</title>
        <meta http-equiv = "refresh" content = "0; url = food/somtum.php" />
    </head>
    <body>
    </body>
</html>