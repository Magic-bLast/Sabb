<?php
    require '../../reqFile.php';
?>

<?PHP
    if(isset($_GET['id'])){
        if($_GET['id']=="1"){
            $tn = $_SESSION['tableNumber'];
            $sql = "SELECT * FROM temporder WHERE tableNum = $tn ORDER BY timeOrdered DESC";
            $query = mysqli_query($conn,$sql);
            //$rc = mysqli_num_rows($query);
            //echo $rc;
            while($rs=mysqli_fetch_array($query)){

                $fn= $rs['foodname'];
                $fq= $rs['foodQuantity'];
                $fd= $rs['foodDetail'];
                
                $sql_ins = "INSERT INTO orderlist (tableNum,foodname,foodQuantity,foodDetail) VALUES ('$tn','$fn','$fq','$fd')";
                $q_ins = mysqli_query($conn,$sql_ins);
            }

            $sql2 = "UPDATE tablestatus SET tableAv=false WHERE tableNum='$tn'";
            $q = mysqli_query($conn,$sql2);
            $sql_del = "DELETE FROM temporder WHERE tableNum = $tn ";
            $q_del = mysqli_query($conn,$sql_del);

            $_SESSION['orderComplete']=$_SESSION['tableNumber'];
            unset($_SESSION['tableNumber']);           
            header('Location:../choosetable.php');
        }
        elseif($_GET['id']=="0"){
            $tn = $_SESSION['tableNumber'];
            $sql_del = "DELETE FROM temporder WHERE tableNum = $tn ";
            $q_del = mysqli_query($conn,$sql_del);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>