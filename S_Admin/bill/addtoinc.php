<?php
    require '../../reqFile.php';
?>

<?PHP
    if(isset($_GET['inc'])){
        $tn = $_SESSION['tb'];
        $inc = $_GET['inc'];
        $text = "อาหารโต๊ะ ".$tn;
        $sql = "UPDATE tablestatus SET tableAv=true WHERE tableNum='$tn'";
        $q = mysqli_query($conn,$sql);
        $sql2 = "INSERT INTO ledger (l_desc,l_money,l_type) VALUES ('$text','$inc','รายรับ')";
        $q2 = mysqli_query($conn,$sql2);

        $_SESSION['billcomplete']=$_SESSION['tb'];
        unset($_SESSION['tb']);           
        header('Location:tablebill.php');
    
    }
?>