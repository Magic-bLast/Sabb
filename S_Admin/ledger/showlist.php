<?php
    require '../../reqFile.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>แสดงรายรับรายจ่าย</title>
        <style>
            body {
                background-image: url("../../img/admin-BG.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
            }
        </style>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
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
                        <a class="nav-link" href="showlist.php" style="font-size:150%; color:rgb(255, 255, 100);">แสดงรายรับรายจ่าย<span class="sr-only">(current)</span></a>
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
            <div class="card" style="margin:auto; width:55%;">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-primary col-sm-12" data-toggle="modal" data-target="#insertList">เพิ่มรายการ</button>
                    <!-- Modal -->
                    <div class="modal fade" id="insertList" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                            <form action="addlist.php" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">  <!--Modal Header -->
                                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายการ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">  <!--Modal Body -->
                                        <div class="form-group row">
                                            <label for="l_name" class="col-sm-2 col-form-label">ชื่อรายการ</label>
                                            <div class="col-sm-10">
                                                <input type="text" style="font-size:85%;" class="form-control" name="l_name" id="l_name" placeholder="ชื่ออาหาร" required="">
                                            </div>
                                            <label for="money" class="col-sm-2 col-form-label">จำนวนเงิน</label>
                                            <div class="col-sm-10">
                                                <input type="number" style="font-size:85%;" class="form-control" name="money" id="money" min="1" placeholder="ราคาของอาหาร" required="">
                                            </div>
                                            <label for="l_type" class="col-sm-2 col-form-label">ประเภท</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="l_type" id="l_type" style="font-size:85%;">
                                                    <option value="รายจ่าย">รายจ่าย</option>
                                                    <option value="รายรับ">รายรับ</option>
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
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-inline">
                            <?php
                                if(isset($_POST['datepicker'])){
                                    echo '<p>วันที่: <input class="col-sm-6" type="text" name="datepicker" id="datepicker" value="'.$_POST['datepicker'].'"></p>';
                                } else {
                                    echo '<p>วันที่: <input class="col-sm-6" type="text" name="datepicker" id="datepicker" placeholder="เดือน/วัน/ปี"></p>';
                                }
                            ?>
                            <button type="submit" class="btn btn-primary col-sm-3">แสดงรายการ</button>
                            <!-- <button type="submit" class="btn btn-secondary col-sm-3" >แสดงรายเดือน</button> -->
                        </div>
                    </form>
                </div>  
            </div> <!-- End of 1st Card -->
            <br/>
            <div class="row">
                <div class="col-sm-1">
                    <p> </p>
                </div>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">รายจ่าย</h4>
                            <table class="table col-sm-12">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ชื่อรายการ</th>
                                        <th scope="col">จำนวนเงิน</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_POST['datepicker'])){
                                            $sum=0;
                                            $getdate = explode("/",$_POST['datepicker']);
                                            $date = '%'.$getdate[2].'-'.$getdate[0].'-'.$getdate[1].'%';
                                            $sql = "SELECT * FROM ledger WHERE l_time LIKE '$date' AND l_type='รายจ่าย'";
                                            $query = mysqli_query($conn,$sql);
                                            while($rs=mysqli_fetch_array($query)){
                                                echo '<tr>';
                                                    echo '<td>'.$rs['l_desc'].'</td>';
                                                    echo '<td>'.$rs['l_money'].'</td>';
                                                echo '</tr>';
                                            $sum+=$rs['l_money'];
                                            }
                                            echo '<tr style="font-size:135%;" class="text-warning">';
                                                echo '<td>รายจ่ายรวม</td>';
                                                echo '<td>'.$sum.'</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">รายรับ</h4>
                            <table class="table col-sm-12">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ชื่อรายการ</th>
                                        <th scope="col">จำนวนเงิน</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        if(isset($_POST['datepicker'])){
                                            $sum=0;
                                            $getdate = explode("/",$_POST['datepicker']);
                                            $date = '%'.$getdate[2].'-'.$getdate[0].'-'.$getdate[1].'%';
                                            $sql = "SELECT * FROM ledger WHERE l_time LIKE '$date' AND l_type='รายรับ'";
                                            $query = mysqli_query($conn,$sql);
                                            while($rs=mysqli_fetch_array($query)){
                                                echo '<tr>';
                                                    echo '<td>'.$rs['l_desc'].'</td>';
                                                    echo '<td>'.$rs['l_money'].'</td>';
                                                echo '</tr>';
                                            $sum+=$rs['l_money'];
                                            }
                                            echo '<tr style="font-size:135%;" class="text-success">';
                                                echo '<td>รายรับรวม</td>';
                                                echo '<td>'.$sum.'</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>