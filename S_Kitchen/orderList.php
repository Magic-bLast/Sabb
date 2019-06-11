<?php
    require '../reqFile.php';
    if(!isset($_SESSION['role'])){
        header('Location:../S_Admin/login.php');
    }
    date_default_timezone_set("Asia/Bangkok");                        
    $day=date("Y-m-d");
    $d='%'.$day.'%';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>แสดงรายการการสั่งอาหาร</title>
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
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark text-white bg-primary">
            <a class="navbar-brand" style='font-size:150%;'>ร้านแซ่บ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../S_Order/choosetable.php">เข้าสู่หน้าเลือกโต๊ะเพื่อสั่งอาหาร</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="orderList.php"  style="font-size:150%; color:rgb(255, 255, 100);">รายการการสั่งอาหาร<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="foodstatus.php">แก้ไขสถานะอาหาร</a>
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
                                    <a href='../S_Admin/acc/logout.php' class='dropdown-item'>Logout</a>
                                </div>
                            </div>
                            <?php
                        }
                        else{   ?>
                            <a class='btn btn-outline-light' href="../S_Admin/login.php" style='font-size:100%;'>Login</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top:120px;">
            <div class="card" style="width:90%; margin:auto;">
                <div class="card-header">
                    <form method="get">
                        <div class="form-inline">      <!-- แสดง Radio เลือกรูปแบบการ Show -->
                            <?php
                                if(isset($_GET['OrderType'])){
                                    if($_GET['OrderType']=="1"){
                                        ?>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-success active col-sm-12" onclick="window.location.href='orderList.php?OrderType=1'">รายการที่เสร็จแล้ว</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='orderList.php?OrderType=2'">รายการที่ยังไม่เสร็จ</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='orderList.php?OrderType=3'">แสดงทั้งหมด</button>
                                        </div> 
                                        <?php
                                    }elseif($_GET['OrderType']=="2") {
                                        ?>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='orderList.php?OrderType=1'">รายการที่เสร็จแล้ว</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-danger active col-sm-12" onclick="window.location.href='orderList.php?OrderType=2'">รายการที่ยังไม่เสร็จ</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='orderList.php?OrderType=3'">แสดงทั้งหมด</button>
                                        </div> 
                                        <?php
                                    }elseif ($_GET['OrderType']=="3"){
                                        ?>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='orderList.php?OrderType=1'">รายการที่เสร็จแล้ว</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='orderList.php?OrderType=2'">รายการที่ยังไม่เสร็จ</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-outline-primary active col-sm-12" onclick="window.location.href='orderList.php?OrderType=3'">แสดงทั้งหมด</button>
                                        </div> 
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='orderList.php?OrderType=1'">รายการที่เสร็จแล้ว</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='orderList.php?OrderType=2'">รายการที่ยังไม่เสร็จ</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-outline-primary active col-sm-12" onclick="window.location.href='orderList.php?OrderType=3'">แสดงทั้งหมด</button>
                                    </div> 
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table col-sm-12">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่ออาหาร</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">โต๊ะที่สั่ง</th>
                                <th scope="col">เวลาที่สั่ง</th>
                                <th scope="col">สถานะอาหาร</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="chgFoodDone.php" method="get">
                            <!-- เริ่มแสดงผลรายการอาหารที่สั่งเข้ามา -->
                            <?PHP
                                if(isset($_GET['OrderType'])){
                                    if($_GET['OrderType']=="1"){
                                        $sql = "SELECT * from orderlist WHERE foodDone=true AND timeOrdered LIKE '$d' ORDER BY timeOrdered DESC";
                                        $query = mysqli_query($conn,$sql);
                                        $rc = mysqli_num_rows($query);
                                        while($rs = mysqli_fetch_array($query)){
                                            echo '<tr>';
                                            echo '
                                                <th scope="row" class="text-success">'.$rc.'</th>
                                                <td>'.$rs['foodname'].'</td>
                                                <td>'.$rs['foodQuantity'].'</td>
                                                <td>'.$rs['foodDetail'].'</td>
                                                <td>'.$rs['tableNum'].'</td>
                                                <td>'.substr($rs['timeOrdered'],11).'</td>';
                                                if($rs['foodDone']==true){
                                                    ?><td>
                                                    <button type="button" class="btn btn-success col-sm-4" disabled>เสร็จ</button>
                                                    <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=0'">ไม่เสร็จ</button>
                                                    </td><?php
                                                } else {
                                                    ?><td>
                                                    <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=1'">เสร็จ</button>
                                                    <button type="button" class="btn btn-danger col-sm-4" disabled>ไม่เสร็จ</button>
                                                    </td><?php
                                                }
                                            echo '</tr>';
                                            $rc--;
                                        }
                                    }elseif ($_GET['OrderType']=="2") {
                                        $sql = "SELECT * from orderlist WHERE foodDone=false AND timeOrdered LIKE '$d' ORDER BY timeOrdered DESC";
                                        $query = mysqli_query($conn,$sql);
                                        $rc = mysqli_num_rows($query);
                                        while($rs = mysqli_fetch_array($query)){
                                            echo '<tr>';
                                            echo '
                                                <th scope="row" class="text-danger">'.$rc.'</th>
                                                <td>'.$rs['foodname'].'</td>
                                                <td>'.$rs['foodQuantity'].'</td>
                                                <td>'.$rs['foodDetail'].'</td>
                                                <td>'.$rs['tableNum'].'</td>
                                                <td>'.substr($rs['timeOrdered'],11).'</td>';
                                                if($rs['foodDone']==true){
                                                    ?><td>
                                                    <button type="button" class="btn btn-success col-sm-4" disabled>เสร็จ</button>
                                                    <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=0'">ไม่เสร็จ</button>
                                                    </td><?php
                                                } else {
                                                    ?><td>
                                                    <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=1'">เสร็จ</button>
                                                    <button type="button" class="btn btn-danger col-sm-4" disabled>ไม่เสร็จ</button>
                                                    </td><?php
                                                }
                                            echo '</tr>';
                                            $rc--;
                                        }
                                    }
                                    elseif ($_GET['OrderType']=="3") {
                                        $sql = "SELECT * from orderlist WHERE timeOrdered LIKE '$d' ORDER BY timeOrdered DESC";
                                        $query = mysqli_query($conn,$sql);
                                        $rc = mysqli_num_rows($query);
                                        while($rs = mysqli_fetch_array($query)){
                                            echo '<tr>';
                                            echo '
                                                <th scope="row">'.$rc.'</th>
                                                <td>'.$rs['foodname'].'</td>
                                                <td>'.$rs['foodQuantity'].'</td>
                                                <td>'.$rs['foodDetail'].'</td>
                                                <td>'.$rs['tableNum'].'</td>
                                                <td>'.substr($rs['timeOrdered'],11).'</td>';
                                                if($rs['foodDone']==true){
                                                    ?><td>
                                                    <button type="button" class="btn btn-success col-sm-4" disabled>เสร็จ</button>
                                                    <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=0'">ไม่เสร็จ</button>
                                                    </td><?php
                                                } else {
                                                    ?><td>
                                                    <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=1'">เสร็จ</button>
                                                    <button type="button" class="btn btn-danger col-sm-4" disabled>ไม่เสร็จ</button>
                                                    </td><?php
                                                }
                                            echo '</tr>';
                                            $rc--;
                                        }
                                    }
                                }else {
                                    $sql = "SELECT * from orderlist WHERE timeOrdered LIKE '$d' ORDER BY timeOrdered DESC";
                                    $query = mysqli_query($conn,$sql);
                                    $rc = mysqli_num_rows($query);
                                    while($rs = mysqli_fetch_array($query)){
                                        echo '<tr>';
                                        echo '
                                            <th scope="row">'.$rc.'</th>
                                            <td>'.$rs['foodname'].'</td>
                                            <td>'.$rs['foodQuantity'].'</td>
                                            <td>'.$rs['foodDetail'].'</td>
                                            <td>'.$rs['tableNum'].'</td>
                                            <td>'.substr($rs['timeOrdered'],11).'</td>';
                                            if($rs['foodDone']==true){
                                                ?><td>
                                                <button type="button" class="btn btn-success col-sm-4" disabled>เสร็จ</button>
                                                <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=0'">ไม่เสร็จ</button>
                                                </td><?php
                                            } else {
                                                ?><td>
                                                <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFoodDone.php?oid=<?=$rs['oid']?>&fd=1'">เสร็จ</button>
                                                <button type="button" class="btn btn-danger col-sm-4" disabled>ไม่เสร็จ</button>
                                                </td><?php
                                            }
                                        echo '</tr>';
                                        $rc--;
                                    }
                                }
                            ?>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>