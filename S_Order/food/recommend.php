<?php
    require '../../reqFile.php'
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            $_SESSION['rec']=1;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        ?>
    </head>
</html>