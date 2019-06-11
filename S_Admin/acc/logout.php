<?php
    require '../../reqFile.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>กำลังออกจากระบบ</title>
        <meta http-equiv = "refresh" content = "3; url = ../../index.php" />
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark text-white bg-dark">
            <a class="navbar-brand" style='font-size:150%;'>ร้านแซ่บ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" style="font-size:150%; color:rgb(255, 255, 100);">หน้าแรก<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <?php
                        if(isset($_SESSION['id'])){ ?>
                            <div class='dropdown' style="font-size:100%;">
                                <a class='btn btn-light dropdown-toggle' href="#" role='button' id='dropdownMenuLink' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                    <?php   echo 'ยินดีต้อนรับ '; 
                                            if($_SESSION['role'] == 'a'){
                                                echo 'ADMIN : '.$_SESSION['displayname'];
                                            } else {
                                                echo $_SESSION['username'];
                                            }
                                    ?>
                                </a>
                                 <div class='dropdown-menu dropdown-menu-lg-right' aria-labelledby='dropdownMenuLink'>
                                    <a href='logout.php' class='dropdown-item'>Logout</a>
                                </div>
                            </div>
                            <?php
                        }
                        else{   ?>
                            <a class='btn btn-outline-light' href="login.php" style='font-size:100%;'>Login</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <div class="card" style="width:40%; margin-top:150px; margin-right:auto; margin-left:auto;">
            <div class="card-header">
                <h3>กำลังออกจากระบบ</h3>
            </div>
            <div class="card-body">
                <h2>ท่านได้ออกจากระบบแล้ว</h2>
            </div>
            <div class="card-footer">
                <p style="margin-buttom:10px; font-size:75%; text-align:center;">กำลังกลับไป<a href="../../index.php">หน้าหลัก</a>ภายใน 3 วินาที</p>
            </div>
        </div>       
        <?php
            session_unset();
            session_destroy();
            die();
        ?>
    </body>
</html>