<?php
    require '../../reqFile.php';
?>
<?php
    if(isset($_POST['l_name'])){
        $l_name = $_POST['l_name'];
        $money = $_POST['money'];
        $l_type = $_POST['l_type'];
        $sql = "INSERT INTO ledger (l_desc,l_money,l_type) VALUES ('$l_name','$money','$l_type')";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
?>