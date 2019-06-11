<?php
    require '../reqFile.php';
    //set role for access this page
    if(!isset($_SESSION['role'])){
        header('Location:../S_Admin/login.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>แก้ไขสถานะอาหาร</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="orderList.php">รายการการสั่งอาหาร</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="foodstatus.php" style="font-size:150%; color:rgb(255, 255, 100);">แก้ไขสถานะอาหาร<span class="sr-only">(current)</span></a>
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
            <div class="card" style="width:70%; margin:auto;">
                <div class="card-header bg-transparent">
                    <form method="get">
                        <div class="form-inline">      <!-- แสดง Radio เลือกรูปแบบการ Show -->
                            <?php
                                if(isset($_GET['ft'])){
                                    if($_GET['ft']=="1"){
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary active col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }elseif($_GET['ft']=="2") {
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success active col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }elseif ($_GET['ft']=="3"){
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger active col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }elseif ($_GET['ft']=="4"){
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning active col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }elseif ($_GET['ft']=="5"){
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info active col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }elseif ($_GET['ft']=="6"){
                                        ?>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-outline-dark active col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                        </div>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-primary col-sm-12" onclick="window.location.href='foodstatus.php?ft=1'">ส้มตำ</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-success col-sm-12" onclick="window.location.href='foodstatus.php?ft=2'">ลาบ/น้ำตก</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='foodstatus.php?ft=3'">ยำ</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-warning col-sm-12" onclick="window.location.href='foodstatus.php?ft=4'">ต้มแซ่บ</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-info col-sm-12" onclick="window.location.href='foodstatus.php?ft=5'">ทอด/ย่าง</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-outline-dark col-sm-12" onclick="window.location.href='foodstatus.php?ft=6'">อื่นๆ</button>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <!-- ส้มตำ ลาบ/น้ำตก ยำ ต้มแซบ ของทอด/ย่าง อื่นๆ-->
                    <form action="chgFstatus.php" method="get">
                        <div class="form-inline">      <!-- แสดง Radio เลือกรูปแบบการ Show -->
                            <?php
                                if(isset($_GET['ft'])){
                                    ?>
                                    <table class="table col-sm-12">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ชื่ออาหาร</th>
                                                <th scope="col">ราคา</th>
                                                <th scope="col">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($_GET['ft']=="1"){
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='ส้มตำ' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-success col-sm-4" disabled>มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-danger col-sm-4" disabled>หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }elseif($_GET['ft']=="2") {
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='ลาบ/น้ำตก' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success active col-sm-4">มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-outline-danger active col-sm-4">หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }elseif ($_GET['ft']=="3"){
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='ยำ' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success active col-sm-4">มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-outline-danger active col-sm-4">หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }elseif ($_GET['ft']=="4"){
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='ต้มแซบ' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success active col-sm-4">มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-outline-danger active col-sm-4">หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }elseif ($_GET['ft']=="5"){
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='ทอด/ย่าง' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success active col-sm-4">มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-outline-danger active col-sm-4">หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }elseif ($_GET['ft']=="6"){
                                                $i=1;
                                                $sql = "SELECT * FROM food WHERE foodType='อื่นๆ' ORDER BY price ASC";
                                                $query = mysqli_query($conn,$sql);
                                                while($rs = mysqli_fetch_array($query)){
                                                    echo '<tr>';
                                                        echo '<td>'.$i.'</td>';
                                                        echo '<td>'.$rs['foodname'].'</td>';
                                                        echo '<td>'.$rs['price'].'</td>';
                                                        if($rs['haveFood']==true){
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success active col-sm-4">มี</button>
                                                            <button type="button" class="btn btn-outline-danger col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=0'">หมด</button>
                                                            </td><?php
                                                        } else {
                                                            ?><td>
                                                            <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='chgFstatus.php?foodname=<?=$rs['foodname']?>&fs=1'">มี</button>
                                                            <button type="button" class="btn btn-outline-danger active col-sm-4">หมด</button>
                                                            </td><?php
                                                        }
                                                        
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            }?>
                                        </tbody>
                                    </table>
                                <?php
                                }
                            ?>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </body>
</html>