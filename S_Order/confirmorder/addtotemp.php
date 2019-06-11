<?php
    require '../../reqFile.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Please Wait</title>
        <!-- <meta http-equiv = "refresh" content = "0; url = somtum.php" /> -->
    </head>
    <body>
    <?php
        $_SESSION['noti']="true";

        $tableNum = $_SESSION['tableNumber'];
        $foodname = $_POST['fn'];
        $foodDetail =  $_POST['foodDetail'];
        $foodQuantity =  $_POST['foodQuantity'];
        
        $sql="INSERT INTO temporder (tableNum,foodname,foodDetail,foodQuantity) VALUES ('$tableNum','$foodname','$foodDetail','$foodQuantity')";
        $mysqli->query($sql);
        $mysqli->close();
        mysqli_close($conn);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        ?>
    </body>
</html>