<?php
    require '../../reqFile.php';

    if(isset($_POST['username'])&&($_POST['password'])){
        $username = $_POST['username'];
        $pw = $_POST['password'];
    }
    $checkusername = mysqli_real_escape_string($conn,$username);
    $checkpw = mysqli_real_escape_string($conn,$pw);
    $sql = "SELECT * FROM usercontrol WHERE log_name = '".$checkusername."' AND log_pw = '".$checkpw."'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_object($query);

    if(!$result){
        $_SESSION['error']="true";
        header("location:../login.php");
    }
    else{
        $_SESSION['username'] = $result->log_name;
        $_SESSION['role'] = $result->role;
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        header("location:../../index.php");
    }
?>