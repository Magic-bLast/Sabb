<?php
    require '../../reqFile.php';
    $t_id = $_GET['tempid'];
    $sql = "DELETE FROM temporder WHERE tempid=$t_id";
    $query = mysqli_query($conn,$sql);
    header('Location:tempOrder.php');
?>