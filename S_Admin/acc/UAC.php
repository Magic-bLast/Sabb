<?php
    require '../../reqFile.php';
?>
<?php
    if(isset($_GET['del'])){
        $delVar = $_GET['del'];
        $sql = "DELETE FROM usercontrol where log_name = '$delVar'";
        $q = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    if(isset($_POST['log_role'])){
        $login_name = $_POST['login_name'];
        $login_pw = $_POST['login_pw'];
        $log_role = $_POST['log_role'];
        $sql = "INSERT INTO usercontrol (log_name,log_pw,role) VALUES ('$login_name','$login_pw','$log_role')";
        $q = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>