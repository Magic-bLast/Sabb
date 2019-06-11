<?php
    require '../../reqFile.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>จัดการรายการอาหาร</title>
        <style>
            .btn{
                font-size:100%;
            }
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
                        <a class="nav-link" href="showfood.php" style="font-size:150%; color:rgb(255, 255, 100);">จัดการรายการอาหาร<span class="sr-only">(current)</span></a>
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
        <div class="container-fluid" style="margin-top:150px;">
            <div class="card" style="width:60%; margin:auto;">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary col-sm-12" data-toggle="modal" data-target="#insertFood">เพิ่มอาหารใหม่</button>
                    <!-- Modal -->
                    <div class="modal fade" id="insertFood" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                            <form action="addfood.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">  <!--Modal Header -->
                                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลอาหาร</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">  <!--Modal Body -->
                                        <div class="form-group row">
                                            <label for="foodname" class="col-sm-2 col-form-label">ชื่ออาหาร</label>
                                            <div class="col-sm-10">
                                                <input type="text" style="font-size:85%;" class="form-control" name="foodname" id="foodname" placeholder="ชื่ออาหาร" required="">
                                            </div>
                                            <label for="foodprice" class="col-sm-2 col-form-label">ราคา</label>
                                            <div class="col-sm-10">
                                                <input type="number" style="font-size:85%;" class="form-control" name="foodprice" id="foodprice" min="1" placeholder="ราคาของอาหาร" required="">
                                            </div>
                                            <label for="foodtype" class="col-sm-2 col-form-label">ประเภท</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="foodtype" id="foodtype" style="font-size:85%;">
                                                    <option value="ส้มตำ">ส้มตำ</option>
                                                    <option value="ลาบ/น้ำตก">ลาบ/น้ำตก</option>
                                                    <option value="ยำ">ยำ</option>
                                                    <option value="ต้มแซบ">ต้มแซบ</option>
                                                    <option value="ทอด/ย่าง">ทอด/ย่าง</option>
                                                    <option value="อื่นๆ">อื่นๆ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">  <!--Modal Footer -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" class="btn btn-success">ตกลง</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div> <!-- End of header -->
                <div class="card-header">
                    <form method="get">
                        <div class="form-inline">
                            <button type="button" class="btn btn-outline-primary col-sm-2" onclick="window.location.href='showfood.php?type=ส้มตำ'">ส้มตำ</button>
                            <button type="button" class="btn btn-outline-warning col-sm-2" onclick="window.location.href='showfood.php?type=ลาบ/น้ำตก'">ลาบ/น้ำตก</button>
                            <button type="button" class="btn btn-outline-danger col-sm-2" onclick="window.location.href='showfood.php?type=ยำ'">ยำ</button>
                            <button type="button" class="btn btn-outline-info col-sm-2" onclick="window.location.href='showfood.php?type=ต้มแซบ'">ต้มแซบ</button>
                            <button type="button" class="btn btn-outline-success col-sm-2" onclick="window.location.href='showfood.php?type=ทอด/ย่าง'">ทอด/ย่าง</button>
                            <button type="button" class="btn btn-outline-secondary col-sm-2" onclick="window.location.href='showfood.php?type=อื่นๆ'">อื่นๆ</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table col-sm-12">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ชื่ออาหาร</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">แก้ไขข้อมูล</th>
                                <th scope="col">สถานะการจำหน่าย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['type'])){
                                    $foodtype = $_GET['type'];
                                    $sql = "SELECT * FROM food WHERE foodType='$foodtype' ORDER by price ASC";
                                    $query = mysqli_query($conn,$sql);
                                    while($rs=mysqli_fetch_array($query)){
                                        echo '<tr>';
                                            echo '<td>'.$rs['foodname'].'</td>';
                                            echo '<td>'.$rs['price'].'</td>';
                                            ?>
                                            <div class="form-inline">
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editfood<?=$rs['foodname']?>">แก้ไข</button>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($rs['foodAv']==true){
                                                            ?>
                                                                <button type="button" class="btn btn-success" onclick="window.location.href='foodcontrol.php?enableFood=<?=$rs['foodname']?>'" disabled>วาง<br/>จำหน่าย</button>
                                                                <button type="button" class="btn btn-outline-danger" onclick="window.location.href='foodcontrol.php?disFood=<?=$rs['foodname']?>'">งด<br/>จำหน่าย</button>
                                                            <?php
                                                        }else {
                                                            ?>
                                                                <button type="button" class="btn btn-outline-success" onclick="window.location.href='foodcontrol.php?enableFood=<?=$rs['foodname']?>'">วาง<br/>จำหน่าย</button>
                                                                <button type="button" class="btn btn-danger" onclick="window.location.href='foodcontrol.php?disFood=<?=$rs['foodname']?>'" disabled>งด<br/>จำหน่าย</button>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            </div>
                                            <!-- Modal 01-->
                                            <div class="modal fade" id="editfood<?=$rs['foodname']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                    <form action="foodcontrol.php" method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header">  <!--Modal Header -->
                                                                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มข้อมูลอาหาร</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">  <!--Modal Body -->
                                                                <div class="form-group row">
                                                                    <label for="foodname" class="col-sm-5 col-form-label">ชื่ออาหาร</label>
                                                                    <div class="col-sm-5">
                                                                    <input type="text" style="font-size:85%;" class="form-control" name="foodname" id="foodname" value="<?=$rs['foodname']?>" required="">
                                                                    </div>
                                                                    <label for="foodprice" class="col-sm-5 col-form-label">ราคา</label>
                                                                    <div class="col-sm-5">
                                                                        <input type="number" style="font-size:85%;" class="form-control" name="foodprice" id="foodprice" min="1" value="<?=$rs['price']?>" required="">
                                                                    </div>
                                                                    <label for="foodtype" class="col-sm-5 col-form-label">ประเภท</label>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-control" name="foodtype" id="foodtype" style="font-size:85%;">
                                                                            <option value="ส้มตำ">ส้มตำ</option>
                                                                            <option value="ลาบ/น้ำตก">ลาบ/น้ำตก</option>
                                                                            <option value="ยำ">ยำ</option>
                                                                            <option value="ต้มแซบ">ต้มแซบ</option>
                                                                            <option value="ทอด/ย่าง">ทอด/ย่าง</option>
                                                                            <option value="อื่นๆ">อื่นๆ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">  <!--Modal Footer -->
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                <button type="submit" class="btn btn-success">ตกลง</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End Modal 01-->
                                            <?php
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>