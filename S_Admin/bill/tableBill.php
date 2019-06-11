<?php
    require '../../reqFile.php';
    if(!isset($_SESSION['role'])){
      header('Location:../login.php');
    }
    if($_SESSION['role']!='a'){
        header('Location:../login.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
  <title>เลือกโต๊ะ</title>
    <style>
        .btn{
            font-size:100%;
        }
    </style>
    <style>
      body {
        background-image: url("../../img/admin-BG.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100%;
      }
    </style>
  <?php
    if(isset($_SESSION['tb'])){
      unset($_SESSION['tb']);
    }
  ?>
  <!-- Modal เมื่อโหลดหน้าขึ้นมาจ่ะ -->
  <?PHP
    if(isset($_SESSION['billcomplete'])){
      echo '
        <script type="text/javascript">
          $(window).on("load",function(){
            $("#myModal").modal("show");
          });
        </script>
      ';
    }
  ?>
  
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">  <!--Modal Header -->
              <h5 class="modal-title" id="exampleModalLongTitle">การคิดเงินเสร็จสิ้น</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">  <!--Modal Body -->
            <h3 style="text-size:100%;">ออกบิลโต๊ะที่ : <?=$_SESSION['billcomplete']?></h3>
            <h3 style="text-size:100%;">เสร็จสิ้นแล้ว</h3>
          </div>
          <div class="modal-footer">  <!--Modal Footer -->
            <?php unset($_SESSION['billcomplete']); ?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
          </div>
        </div>
      </div>
    </div>

</head>

<body>
  <div class="container">
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
                    <a class="nav-link" href="tableBill.php" style="font-size:150%; color:rgb(255, 255, 100);">คิดเงิน<span class="sr-only">(current)</span></a>
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

    <form action="showbill.php" method="post"> 
    <div class="card" style="margin-top:150px;">
      <div class="card-header">
        <p style="font-size:125%;">เลือกโต๊ะที่จะแสดงบิล</p>
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
                  echo '<td><button type="submit" name="tableNumber" value="'.$tableNum.'" class="btn btn-outline-success btn-lg" style="font-size:200%;" disabled>'.$tableNum.'</button></td>';
                else
                  echo  '<td><button type="submit" name="tableNumber" value="'.$tableNum.'" class="btn btn-danger btn-lg" style="font-size:200%;">'.$tableNum.'</button></td>';
              ?>
              <?php if($tableNum%5==0)  echo '</tr>';?>  
            <?php  } ?>
          </tbody>
        </table>
    
      </div>
      <div class="card-footer">
        
      </div>
    </div> <!-- Card End -->
    </form>

  </div>

</body>

</html>