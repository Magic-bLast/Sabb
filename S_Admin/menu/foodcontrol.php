<?php
    require '../../reqFile.php';
?>
<?php
    if(isset($_POST['foodname'])){
        $foodname = $_POST['foodname'];
        $price = $_POST['foodprice'];
        $fType = $_POST['foodtype'];
        $sql = "UPDATE food SET foodname='$foodname',price='$price',foodType='$fType' WHERE foodname='$foodname'";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if(isset($_GET['disFood'])){
        $dis = $_GET['disFood'];
        $sql = "UPDATE food SET foodAv=false WHERE foodname='$dis'";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if(isset($_GET['enableFood'])){
        $ena = $_GET['enableFood'];
        $sql = "UPDATE food SET foodAv=true WHERE foodname='$ena'";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>