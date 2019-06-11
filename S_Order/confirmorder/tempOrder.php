<?php
    require '../../reqFile.php'
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style>
        body {
            background-image: url("../../img/admin-BG.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
        }
        </style>
        <title>รายการอาหารของโต๊ะ <?=$_SESSION['tableNumber']?></title>
        <!-- CSS import -->
        <link href="../../open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style='background-color: #ff2600;'>
            <a class="navbar-brand" style='font-size:150%;'>ร้านแซ่บ (โต๊ะ <?=$_SESSION['tableNumber']?>)</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../choosetable.php">เลือกโต๊ะ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="../food/recommend.php" style="font-size:75%; margin-top:5px;">รายการแนะนำ(รอพัฒนา)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/somtum.php">ส้มตำ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/larb.php">ลาบ/น้ำตก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/yum.php">ยำ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/tomsabb.php">ต้มแซบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/fried.php">ของทอด/ของย่าง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../food/other.php">อื่นๆ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Coming Soon !!!</a>
                    </li>
                    <li class="nav-item active">
                        <?PHP
                            $tn=$_SESSION['tableNumber'];
                            $res = $mysqli->query("SELECT * FROM temporder WHERE tableNum=$tn"); // ทำการ query คำสั่ง sql 
                            $total=$res->num_rows;  // นับจำนวนถวที่แสดง ทั้งหมด
                        ?>
                        <a class="nav-link" href="tempOrder.php" style="font-size:120%; color:rgb(255, 255, 100);">รายการที่สั่งไว้(<?=$total?>) <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="card" style="margin-top:100px;">
                <div class="card-header text-white bg-info" style="font-size:150%;">โต๊ะของท่านคือ โต๊ะที่ <?=$_SESSION['tableNumber']?></div>
                <div class="card-body">
                    <table class="table table-striped" style="width:100%">
                        <tbody>
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ชื่ออาหาร</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">รายละเอียดอื่นๆ</th>
                                <th scope="col">----</th>
                                </tr>
                            </thead>
                            <?PHP
                            $tn = $_SESSION['tableNumber'];
                            $sql = "SELECT * FROM temporder WHERE tableNum = $tn ORDER BY timeOrdered DESC";
                            $query = mysqli_query($conn,$sql);
                            while($rs=mysqli_fetch_array($query)){
                                echo '<tr>';
                                echo '<td>'.$rs["foodname"].'</td>';
                                echo '<td>'.$rs["foodQuantity"].'</td>';
                                echo '<td>'.$rs["foodDetail"].'</td>';
                                echo '<form method="get">';
                                echo '<td><button type="button" class="btn btn-danger mr-sm-2"
                                      data-toggle="modal" data-target="#confirmDEL'.$rs["tempid"].'">
                                        <span class="oi oi-trash"></span>
                                      </button></td>';
                                echo '</form>';
                                echo '</tr>';
                                ?>
                                <form action="DelFromTempOrder.php" method="get">
                                <div class="modal fade" id="confirmDEL<?=$rs["tempid"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการลบ <?=$rs["foodname"]?> ออกจากรายการ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 style="text-size:100%;">ต้องการยกเลิก : <?=$rs["foodname"]?></h3>
                                                <h3 style="text-size:100%;">จำนวน : <?=$rs["foodQuantity"]?> ที่</h3>
                                                <h3 style="text-size:100%;">รายละเอียด : <?=$rs["foodDetail"]?></h3>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                <a type="button" class="btn btn-danger" href="DelFromTempOrder.php?tempid=<?=$rs["tempid"]?>">ลบ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                <form action="checktoOrder.php" method="get">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <button  type="button"  class="btn btn-outline-danger" data-toggle="modal" data-target="#check1" style="font-size:100%;width:100%;">
                                <span class="oi oi-book"></span>ยกเลิก<br/>การสั่งทั้งหมด
                            </button>
                            <div class="modal fade" id="check1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการยกเลิกรายการอาหาร</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 style="text-size:100%;">ต้องการยกเลิกรายการอาหารทั้งหมดใช่หรือไม่</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                            <a type="button" class="btn btn-danger" href="checktoOrder.php?id=0">ใช่</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 offset-md-4">
                            <button style="font-size:100%;width:100%;" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#check2">
                                <span class="oi oi-book"></span>ยืนยัน<br/>การสั่ง
                            </button>
                            <div class="modal fade" id="check2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการส่งรายการอาหาร</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 style="text-size:100%;">ต้องการยืนยันการส่งรายการอาหารทั้งหมดใช่หรือไม่</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                                            <a type="button" class="btn btn-outline-success" href="checktoOrder.php?id=1">ใช่</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>