<?php
    require '../../reqFile.php';
    include 'rec.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>สั่งอาหาร</title>
  <?php
    if(!isset($_SESSION['tableNumber'])){
      $_SESSION['alertTABLE']=1;
      header('Location:../choosetable.php');
    }
  ?>
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
            <a class="nav-link disabled" href="recommend.php" style="font-size:75%; margin-top:5px;">รายการแนะนำ(รอพัฒนา)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="somtum.php">ส้มตำ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="larb.php">ลาบ/น้ำตก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="yum.php">ยำ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tomsabb.php">ต้มแซบ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="fried.php">ของทอด/ของย่าง <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="other.php">อื่นๆ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Coming Soon !!!</a>
          </li>
          <li class="nav-item">
          <?PHP
          $tn=$_SESSION['tableNumber'];
          $res = $mysqli->query("SELECT * FROM temporder WHERE tableNum=$tn"); // ทำการ query คำสั่ง sql 
          $total=$res->num_rows;  // นับจำนวนถวที่แสดง ทั้งหมด
          ?>
            <a class="nav-link" href="../confirmorder/tempOrder.php">รายการที่สั่งไว้(<?=$total?>)</a>
          </li>
        </ul>
      </div>
    </nav>
<!-- ENDING OF NAV -->
  <div class="container">
    <?php
      if(isset($_SESSION['noti'])){
        ?>
        <div class="alert alert-success" role="alert" style="width:100%; margin-top:100px; margin-bottom: -95px;">
          การสั่งอาหารเสร็จสมบูรณ์
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        unset($_SESSION['noti']);
      }
    ?>
    <div class="card" style="margin-top:100px;">
      <div class="card-header">โต๊ะของท่านคือ <?=$_SESSION['tableNumber']?></div>
      <img src="../../img/Grill.jpg" class="card-img-top" style="width:60%; margin-top:15px; margin-left:auto; margin-right:auto;">
      <div class="card-body">
        <table class="table table-striped">
          <tbody>
            <!-- แสดงรายการอาหาร -->
            <?php
              
              $q="SELECT foodname,price FROM food WHERE ((foodType = 'ทอด/ย่าง') AND (haveFood!=false) AND (foodAv != false)) ORDER BY price ASC";
              $result = $mysqli->query($q); // ทำการ query คำสั่ง sql 
              $total=$result->num_rows;  // นับจำนวนแถวที่แสดง ทั้งหมด
              while($rs=$result->fetch_object()){ // วนลูปแสดงข้อมูล
            ?>
            <tr>
                <td name="foodName" value="'.$foodName.'" ><?=$rs->foodname?></td>
                <td><?=$rs->price?> THB</td>
                <td></td><td></td><td></td>
                <td style="float:right;">
                <button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#confirmOrder<?=$rs->foodname?>">
                        สั่ง<br>รายการนี้
                </button>
                  <!-- Modal -->
                  <form action="../confirmorder/addtotemp.php" method="post">
                  <div class="modal fade" id="confirmOrder<?=$rs->foodname?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLongTitle">สั่ง <?=$rs->foodname?></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h3 style="text-size:100%;">ต้องการสั่ง</h3>
                          <input type="text" readonly class="form-control" name="fn" id="fn" placeholder="<?=$rs->foodname?>" value="<?=$rs->foodname?>" style="font-size:100%;"><br/>
                          <div class="form-group row">
                            <label class="col-sm-3">จำนวนที่สั่ง</label>
                            <select class="form-control col-sm-3" name="foodQuantity">
                              <?php
                                for($i=1;$i<=10;$i++){
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                              ?>
                            </select>
                            <div class="w-100 d-none d-md-block"></div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4" for="foodDetail">รายละเอียดอื่นๆ</label>
                            <select class="form-control col-sm-5" name="foodDetail" style="font-size:100%;">
                              <option value="-">-</option>
                              <option value="เผ็ดๆ">เผ็ดๆ</option>
                              <option value="รสจัด">รสจัด</option>
                              <option value="เผ็ดน้อย">เผ็ดน้อย</option>
                              <option value="ไม่ใส่พริก">ไม่ใส่พริก</option>
                              <option value="ไม่ใส่พริก-ผัก">ไม่ใส่พริก-ผัก</option>
                              <option value="ไม่ใส่ชูรส">ไม่ใส่ชูรส</option>
                            </select>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                          <button type="submit" class="btn btn-success">ยืนยัน</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </td>
            </tr>
            <?php } ?>
            <!-- ส่วนอาหารหมด  -->
            <?php
              
              $q="SELECT foodname,price FROM food WHERE ((foodType = 'ทอด/ย่าง') AND (haveFood!=true) AND (foodAv != false)) ORDER BY price ASC";
              $result = $mysqli->query($q); // ทำการ query คำสั่ง sql 
              $total=$result->num_rows;  // นับจำนวนแถวที่แสดง ทั้งหมด
              while($rs=$result->fetch_object()){ // วนลูปแสดงข้อมูล
            ?>
            <tr style='font-size:75%;'>
                <td><?=$rs->foodname?></td>
                <td><?=$rs->price?> THB</td>
                <td></td><td></td><td></td>
                <td style="float:right;">
                  <button disabled type="button" href="#" class="btn btn-outline-danger">หมด</button>
                </td>
            </tr>
            <?php } ?>
            <!-- งดจำหน่าย  -->
            <?php
              
              $q="SELECT foodname,price FROM food WHERE ((foodType = 'ทอด/ย่าง') AND (foodAv != true)) ORDER BY price ASC";
              $result = $mysqli->query($q); // ทำการ query คำสั่ง sql 
              $total=$result->num_rows;  // นับจำนวนแถวที่แสดง ทั้งหมด
              while($rs=$result->fetch_object()){ // วนลูปแสดงข้อมูล
            ?>
            <tr style='font-size:75%;'>
                <td><?=$rs->foodname?></td>
                <td><?=$rs->price?> THB</td>
                <td></td><td></td><td></td>
                <td style="float:right;">
                  <button disabled type="button" href="#" class="btn btn-dark">งดจำหน่าย</button>
                </td>
            </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>    
   
    <?php
      $mysqli->close();
    ?>

      </div>
    </div>
  </div>

</body>

</html>