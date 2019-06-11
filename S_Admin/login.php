<?php
    require '../reqFile.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title>เข้าสู่ระบบ</title>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <script>
            $(document).ready(function() {
                $("#show_hide_pw button").on('click', function(event) {
                    event.preventDefault();
                    if($('#show_hide_pw input').attr("type") == "text"){
                        $('#show_hide_pw input').attr('type', 'password');
                    }else if($('#show_hide_pw input').attr("type") == "password"){
                        $('#show_hide_pw input').attr('type', 'text');
                    }
                });
            });
        </script>
        <link href="../open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
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
                        <a class="nav-link" href="../index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php" style="font-size:150%; color:rgb(255, 255, 100);">เข้าสู่ระบบ<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="acc/verify.php" method="post">
            <?php
                if(isset($_SESSION['error'])){
                    ?>
                    <div class="alert alert-danger" role="alert" style="width:40%; margin-top:150px; margin-bottom:-145px; margin-right:auto; margin-left:auto;">
                        ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
            ?>
            <div class="card" style="width:40%; margin-top:150px; margin-right:auto; margin-left:auto;">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body" style="font-size:90%;">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">ชื่อบัญชี :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" placeholder="ชื่อบัญชีผู้ใช้งาน" required=""><br/>
                        </div>
                        <label for="password" class="col-sm-2 col-form-label">รหัสผ่าน :</label>
                        <div class="input-group col-sm-10" id="show_hide_pw">
                            <input type="password" class="form-control" name="password" id="password" placeholder="รหัสผ่าน" required=""><br/>
                            <span class="input-group-btn">
                                <button class="btn btn-outline-warning reveal" type="button" data-toggle="button" aria-pressed="false" autocomplete="off"><span class="oi oi-key"></span></button>
                            </span>
                        </div>                        
                        <div class="col-md-4 offset-md-4">
                            <br/>
                            <button type="submit" class="btn btn-outline-primary" style="width:100%">Login</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="height:50%;">
                    <p style="font-size:75%; text-align:center;"><a href="../index.php">กลับสู่หน้าแรก</a></p>
                </div>
            </div>
        </form>
    </body>
</html>