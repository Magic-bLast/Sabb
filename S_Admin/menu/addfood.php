<?php
    require '../../reqFile.php';
?>
<?php
    if(isset($_POST['foodname'])){
        $foodname = $_POST['foodname'];
        $price = $_POST['foodprice'];
        $fType = $_POST['foodtype'];
        $sql = "INSERT INTO food (foodname,price,foodType) VALUES ('$foodname','$price','$fType')";
        $query = mysqli_query($conn,$sql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
?>