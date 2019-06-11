<?php
    require 'reqFile.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>หน้าหลัก</title>
        <style>
            .btn{
                font-size:100%;
            }
        </style>
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
                        if(isset($_SESSION['role'])){ ?>
                            <div class='dropdown' style="font-size:100%;">
                                <a class='btn btn-light dropdown-toggle' href="#" role='button' id='dropdownMenuLink' data-toggle='dropdown'
                                aria-haspopup='true' aria-expanded='false'>
                                    <?php   echo 'ยินดีต้อนรับ '; 
                                            if($_SESSION['role'] == 'a'){
                                                echo 'ADMIN : '.$_SESSION['username'];
                                            } else {
                                                echo $_SESSION['username'];
                                            }
                                    ?>
                                </a>
                                 <div class='dropdown-menu dropdown-menu-lg-right' aria-labelledby='dropdownMenuLink'>
                                    <a href='S_Admin/acc/logout.php' class='dropdown-item'>Logout</a>
                                </div>
                            </div>
                            <?php
                        }
                        else{   ?>
                            <a class='btn btn-outline-light' href="S_Admin/login.php" style='font-size:100%;'>Login</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <div class="card" style="width:40%; margin-top:150px; margin-right:auto; margin-left:auto;">
            <div class="card-header text-white bg-info">
                <h3>หน้าแรก</h3>
            </div>
            <div class="card-body">
                <?php
                    if(isset($_SESSION['role'])){
                        if($_SESSION['role']=='a'){
                            ?>
                            <p><button type="button" class="btn btn-dark btn-lg col-sm-12" onclick="window.location.href='S_Admin/adminCMD.php'">Admin</button></p>
                            <p><button type="button" class="btn btn-primary btn-lg col-sm-12" onclick="window.location.href='S_Kitchen/orderList.php'">ครัว</button><br/></p>
                            <?php
                        } elseif ($_SESSION['role']=='k') {
                            ?>
                            <p><button type="button" class="btn btn-primary btn-lg col-sm-12" onclick="window.location.href='S_Kitchen/orderList.php'">ครัว</button><br/></p>       
                            <?php
                        }
                    }    
                ?>
                <p><button type="button" class="btn btn-danger btn-lg col-sm-12" onclick="window.location.href='S_Order/choosetable.php'">สั่งอาหาร</button><br/></p>
            </div>
            <div class="card-footer" style="height:50%;">
                <?php
                    if(isset($_SESSION['role'])){
                        echo '<p style="font-size:75%; text-align:center;"><a href="S_Admin/acc/logout.php">คลิกที่นี่เพื่อออกจากระบบ</a></p>';
                    } else {
                        echo '<p style="font-size:75%; text-align:center;"><a href="S_Admin/login.php">คลิกที่นี่เพื่อเข้าสู่ระบบ</a></p>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>