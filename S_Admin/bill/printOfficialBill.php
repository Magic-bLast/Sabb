<?php
    require '../../reqFile.php';
    if(!isset($_SESSION['role'])){
        header('Location:../login.php');
    }
    if($_SESSION['role']!='a'){
        header('Location:../login.php');
    }
    if(isset($_POST['Cname'])){
        $Cname = $_POST['Cname'];
        $Cadd = $_POST['Cadd'];
    }
    else{
        header('Location:officialBill.php');
    }

    $tableNum = $_SESSION['tb'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>กรอกข้อมูลบิลเงินสดของโต๊ะ : <?=$tableNum?></title>
        <style>
            body {
                background-image: url("../../img/admin-BG.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
            }
        </style>
        <script>
            function printDiv(printablediv) {
                var printContents = document.getElementById(printablediv).innerHTML;     
                var originalContents = document.body.innerHTML;       
                document.body.innerHTML = printContents;      
                window.print();      
                document.body.innerHTML = originalContents;
            }
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
            <div class="card" style="width:50%; margin:auto; font-size:75%">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-secondary col-sm-12" onclick="javascript:printDiv('bill')" style="font-size:135%;">พิมพ์บิลเงินสด</button>
                </div>
                <div id="bill">
                    <div class="card-body border border-dark">
                        <h1 class="display-4" style="text-align:center;">ร้านแซ่บ</h1>
                        <h5 style="text-align:center;">238/21 ถ.เอกชัย ต.มหาชัย อ.เมือง จ.สมุทรสาคร  74000<br/>โทร. 034-837851</h5>
                        <div class="form-inline">
                            <h4 class="col-sm-6">โต๊ะ <?=$tableNum?></h4>
                            <p class="col-sm-6">วันที่ _____________________________</p>
                        </div>
                        <div class="form-inline">
                            <p>ชื่อลูกค้า : <?=$Cname?></p>
                        </div>
                        <div class="form-inline">
                            <p>ที่อยู่ : <?=$Cadd?></p>
                        </div>
                    </div>
                    <div class="card-body" style="font-size:80%">
                        <table class="table table-bordered table-sm col-sm-12">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ชื่ออาหาร</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sum=0;
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
                                                $sum+=($rs["foodQuantity"]*$r["price"]);
                                            }
                                        echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align:center;">รวมเป็นเงินทั้งหมด</td>
                                    <td style="width:25%"><?=$sum?> THB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-outline-success col-sm-4" onclick="window.location.href='addtoinc.php?inc=<?=$sum?>'" style="font-size:135%; float:right;">ชำระเงินเรียบร้อย</button>
                    </div>    
            </div>
            
        </div>

    </body>
</html>