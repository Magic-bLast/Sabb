<?php
    require '../reqFile.php';
?>

<?PHP
    if(isset($_GET['oid'])){
        $oid = $_GET['oid'];

        $sql = "DELETE FROM orderlist WHERE oid=$oid";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>