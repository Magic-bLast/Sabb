<?php
    require '../../reqFile.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>ส่วนจัดการผู้ใช้งาน</title>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                        <a class="nav-link" href="usercontrol.php" style="font-size:150%; color:rgb(255, 255, 100);">ข้อมูลผู้ใช้งาน<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top:150px";>
            <div class="card" style="width:50%; margin:auto;">
                <div class="card-header">
                    <h3>ส่วนจัดการผู้ใช้งานระบบ</h3>
                </div>
                <div class="card-body">
                    <form action="UAC.php" method="get">
                        <table class="table table-bordered table-sm col-sm-12">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">username</th>
                                    <th scope="col">password</th>
                                    <th scope="col">บทบาท</th>
                                    <th scope="col">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM usercontrol";
                                    $q = mysqli_query($conn,$sql);
                                    while($rs=mysqli_fetch_array($q)){
                                        echo '<tr>';
                                            echo '<td>'.$rs["log_name"].'</td>';
                                            echo '<td>'.$rs["log_pw"].'</td>';
                                            if($rs["role"]=='a'){
                                                echo '<td>ADMIN</td>';
                                            }else {
                                                echo '<td>Kitchen</td>';
                                            }
                                            if($rs["log_name"]==$_SESSION["username"]){
                                                echo '<td><button type="button" class="btn btn-danger col-sm-12" disabled>ลบ</button></td>';
                                            } else {
                                                $usn = $rs["log_name"];
                                                ?>
                                                    <td><button type="button" class="btn btn-outline-danger col-sm-12" onclick="window.location.href='UAC.php?del=<?=$usn?>'">ลบ</button></td>
                                                <?php
                                            }
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="card-footer">
                    <form action="UAC.php" method="post">
                        <table class="table table-bordered table-sm col-sm-12">
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="login_name" id="login_name" minlength="5" placeholder="ชื่อผู้ใช้(ความยาวตั้งแต่ 5 ตัวอักษรขึ้นไป)" required=""></td>
                                    <td><input type="text" class="form-control" name="login_pw" id="login_pw" minlength="5" placeholder="รหัสผ่าน(ความยาวตั้งแต่ 5 ตัวอักษรขึ้นไป)" required=""></td>
                                    <td>
                                        <select class="form-control" name="log_role">
                                            <option value="k">ครัว</option>
                                            <option value="a">เจ้าของร้าน</option>
                                        </select>
                                    </td>
                                    <td><button type="submit" class="btn btn-primary col-sm-12">เพิ่มบัญชีนี้</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>