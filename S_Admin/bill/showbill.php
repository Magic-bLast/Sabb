<?php
    require '../../reqFile.php';
    if(!isset($_SESSION['role'])){
        header('Location:../login.php');
    }
    if($_SESSION['role']!='a'){
        header('Location:../login.php');
    }

    if(isset($_POST['tableNumber'])){
        $_SESSION['tb'] =  $_POST['tableNumber'];
    }
    $tableNum = $_SESSION['tb'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>แสดงบิลโต๊ะ : <?=$tableNum?></title>
        <style>
            body {
                background-image: url("../../img/admin-BG.jpg");
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
                        <a class="nav-link" href="../../index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../adminCMD.php">เฉพาะAdmin</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="tablebill.php" style="font-size:150%; color:rgb(255, 255, 100);">คิดเงิน<span class="sr-only">(current)</span></a>
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
                                    <a href='../../index.php' class='dropdown-item'>หน้าหลัก</a>
                                    <div class="dropdown-divider"></div>
                                    <a href='../acc/logout.php' class='dropdown-item'>Logout</a>
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
        <div class="container-fluid" style="margin-top:120px;">
            <div class="card" style="width:50%; margin:auto;">
                <div class="card-header">
                    <div class="form-inline">
                        <p class="col-sm-9">รายการอาหาร โต๊ะ_<?=$tableNum?></p>
                        <button type="button" class="btn btn-outline-info col-sm-3" style="font-size:100%;" onclick="window.location.href='printbill.php'">แสดงบิล</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table col-sm-12">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ชื่ออาหาร</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">เวลาที่เสร็จ</th>
                                <th scope="col">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM orderlist WHERE tableNum=$tableNum AND foodDone=true ORDER BY finishtime DESC";
                                $query = mysqli_query($conn,$sql);
                                while($rs=mysqli_fetch_array($query)){
                                    echo '<tr>';
                                        echo '<td>'.$rs["foodname"].'</td>';
                                        echo '<td>'.$rs["foodQuantity"].'</td>';
                                        $fn = $rs["foodname"];
                                        $s = "SELECT * FROM food WHERE foodname='$fn'";
                                        $q = mysqli_query($conn,$s);
                                        while($r=mysqli_fetch_array($q)){
                                            echo '<td>'.($rs["foodQuantity"]*$r["price"]).'</td>';
                                        }
                                        echo '<td>'.substr($rs["finishtime"],11).'</td>';
                                        ?><td>
                                        <div class="form-inline">
                                            <button type="button" class="btn btn-success col-sm-4" disabled>เสร็จ</button>
                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='../../S_Kitchen/chgFoodDone.php?oid=<?=$rs['oid']?>&fd=0'">ไม่เสร็จ</button>
                                            <button type="button" class="btn btn-outline-dark col-sm-4" onclick="window.location.href='../../S_Kitchen/delOrder.php?oid=<?=$rs['oid']?>'">ยกเลิก</button>
                                        </div>
                                        </td><?php
                                    echo '</tr>';
                                }
                                $sql = "SELECT * FROM orderlist WHERE tableNum=$tableNum AND foodDone=false ORDER BY finishtime";
                                $query = mysqli_query($conn,$sql);
                                while($rs=mysqli_fetch_array($query)){
                                    echo '<tr>';
                                        echo '<td>'.$rs["foodname"].'</td>';
                                        echo '<td>'.$rs["foodQuantity"].'</td>';
                                        $fn = $rs["foodname"];
                                        $s = "SELECT * FROM food WHERE foodname='$fn'";
                                        $q = mysqli_query($conn,$s);
                                        while($r=mysqli_fetch_array($q)){
                                            echo '<td>'.($rs["foodQuantity"]*$r["price"]).'</td>';
                                        }
                                        echo '<td>'.substr($rs["finishtime"],11).'</td>';
                                        ?><td>
                                        <div class="form-inline">
                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='../../S_Kitchen/chgFoodDone.php?oid=<?=$rs['oid']?>&fd=1'">เสร็จ</button>
                                            <button type="button" class="btn btn-danger col-sm-4" disabled>ไม่เสร็จ</button>
                                            <button type="button" class="btn btn-outline-dark col-sm-4" onclick="window.location.href='../../S_Kitchen/delOrder.php?oid=<?=$rs['oid']?>'">ยกเลิก</button>
                                        </div>
                                        </td><?php
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
</html>