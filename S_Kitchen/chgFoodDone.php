<?php
    require '../reqFile.php';
?>

<?PHP
    if((isset($_GET['oid'])) && (isset($_GET['fd']))){
        $oid = $_GET['oid'];
        $fd = $_GET['fd'];
        
        if($fd==0){
            $sql = "UPDATE orderlist SET foodDone=false WHERE oid='$oid'";
            $query = mysqli_query($conn,$sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "UPDATE orderlist SET foodDone=true , finishtime=NOW() WHERE oid='$oid'";
            $query = mysqli_query($conn,$sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>