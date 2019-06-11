<?php
    require '../reqFile.php';
?>

<?PHP
    if((isset($_GET['foodname'])) && (isset($_GET['fs']))){
        $fn = $_GET['foodname'];
        $fs = $_GET['fs'];
        //echo $fn.'<br/>Hi there is'.$fs.'<br/>';
        
        if($fs==0){
            $sql = "UPDATE food SET haveFood=false WHERE foodname='$fn'";
            $query = mysqli_query($conn,$sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            //echo "True 2 False";
        } else {
            $sql = "UPDATE food SET haveFood=true WHERE foodname='$fn'";
            $query = mysqli_query($conn,$sql);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            //echo "False 2 True";
        }
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>