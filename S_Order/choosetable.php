<?php
    require '../reqFile.php'
?>
<!DOCTYPE html>
<html>

<head>
  <title>เลือกโต๊ะ</title>
  <style>
    body {
                background-image: url("../img/admin-BG.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
            }
  </style>
  <?php
    if(isset($_SESSION['tableNumber'])){
      unset($_SESSION['tableNumber']);
    }
  ?>
  <!-- Modal เมื่อโหลดหน้าขึ้นมาจ่ะ -->
  <?PHP
    if(isset($_SESSION['orderComplete'])){
      echo '
        <script type="text/javascript">
          $(window).on("load",function(){
            $("#myModal").modal("show");
          });
        </script>
      ';
    }elseif (isset($_SESSION['alertTABLE'])) {
      echo '
        <script type="text/javascript">
          $(window).on("load",function(){
            $("#alertTable").modal("show");
          });
        </script>
      ';
    }
  ?>
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">  <!--Modal Header -->
              <h5 class="modal-title" id="exampleModalLongTitle">สั่งอาหารเสร็จสิ้น</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">  <!--Modal Body -->
            <h3 style="text-size:100%;">การสั่งอาหาร</h3>
            <h3 style="text-size:100%;">จากลูกค้าโต๊ะที่ : <?=$_SESSION['orderComplete']?></h3>
            <h3 style="text-size:100%;">เสร็จสิ้นแล้ว</h3>
          </div>
          <div class="modal-footer">  <!--Modal Footer -->
            <?php unset($_SESSION['orderComplete']); ?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="alertTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger">  <!--Modal Header -->
              <h5 class="modal-title text-white" id="exampleModalLongTitle">ALERT</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">  <!--Modal Body -->
            <h3 style="text-size:100%;">กรุณาเลือกโต๊ะของท่านก่อนสั่งอาหารครับ/ค่ะ</h3>
          </div>
          <div class="modal-footer">  <!--Modal Footer -->
            <?php unset($_SESSION['alertTABLE']); ?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
          </div>
        </div>
      </div>
    </div>

</head>

<body>
  <div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style='background-color: #ff2600;'>
      <a class="navbar-brand" style='font-size:150%;'>ร้านแซ่บ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="choosetable.php">เลือกโต๊ะ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="somtum.php">ส้มตำ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="larb.php">ลาบ/น้ำตก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="yum.php">ยำ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="tomsabb.php">ต้มแซบ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="fried.php">ของทอด/ของย่าง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="other.php">อื่นๆ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Coming Soon !!!</a>
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

    <form action="CTtoCF.php" method="post"> 
    <div class="card" style="margin-top:150px;">
      <div class="card-header">
        <p style="font-size:125%;">เลือกโต๊ะที่ท่านนั่ง  (สีเขียว = โต๊ะว่าง   สีแดง = โต๊ะที่มีลูกค้าใช้บริการ)</p>
      </div>
      <div class="card-body">
        <table class="table table-borderless">
          <tbody>
          <?php
            $q="SELECT * FROM tablestatus ORDER BY tableNum ASC";
            $result = $mysqli->query($q); // ทำการ query คำสั่ง sql 
            $total=$result->num_rows;  // นับจำนวนแถวที่แสดง ทั้งหมด
            while($rs=$result->fetch_object()){ // วนลูปแสดงข้อมูล
              $tableNum = $rs->tableNum;
              $tableAv = $rs->tableAv;
              if ($tableNum%5==1)
                echo "<tr>"
              ?>
              <?php
                if($tableAv==true)
                  echo '<td><button href="CTtoCF.php" name="tableNumber" value="'.$tableNum.'" class="btn btn-outline-success btn-lg" style="font-size:200%;">'.$tableNum.'</button></td>';
                else
                  echo  '<td><button href="CTtoCF.php" name="tableNumber" value="'.$tableNum.'" class="btn btn-danger btn-lg" style="font-size:200%;">'.$tableNum.'</button></td>';
              ?>
              <?php if($tableNum%5==0)  echo '</tr>';?>  
            <?php  } ?>
          </tbody>
        </table>
    
      </div>
    </div>
    </form>

  </div>

</body>

</html>