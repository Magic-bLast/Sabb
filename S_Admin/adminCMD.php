<?php
    require '../reqFile.php';

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Command</title>
        <style>
            .btn{
                font-size:100%;
            }
            body {
                background-image: url("../img/admin-BG.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
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
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="adminCMD.php" style="font-size:150%; color:rgb(255, 255, 100);">เฉพาะAdmin<span class="sr-only">(current)</span></a>
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
                                    <a href='../index.php' class='dropdown-item'>หน้าหลัก</a>
                                    <div class="dropdown-divider"></div>
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
                <h3>Admin</h3>
            </div>
            <div class="card-body">
                <h1><button type="button" class="btn btn-dark btn-lg col-sm-12" onclick="window.location.href='bill/tableBill.php'">ระบบคิดเงิน</button></h1>
            </div>
            <div class="card-body border border-muted" style="font-size:75%;">
                <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='menu/showfood.php'">ส่วนแก้ไขรายการอาหาร</button><br/>
                <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='ledger/showlist.php'">ส่วนรายรับรายจ่าย</button><br/>
                <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='acc/usercontrol.php'">ส่วนจัดการบัญชีผู้ใช้</button><br/>
            </div>
            <div class="card-footer" style="height:50%;">
                <p style="font-size:75%; text-align:center;"><a href="../index.php">คลิกที่นี่เพื่อกลับสู่หน้าหลัก</a></p>
            </div>
        </div>
    </body>
</html>