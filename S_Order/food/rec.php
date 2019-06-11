<?php
    // require '../../reqFile.php'
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?PHP
            if(isset($_SESSION['rec'])){
            echo '
                <script type="text/javascript">
                $(window).on("load",function(){
                    $("#myModal").modal("show");
                });
                </script>
            ';
            unset($_SESSION['rec']);
            }
        ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">  <!--Modal Header -->
                    <h5 class="modal-title" id="exampleModalLongTitle">รายการอาหารแนะนำ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  <!--Modal Body -->
                    <?php
                        date_default_timezone_set("Asia/Bangkok");                        
                        $day=date("Y-m-d",strtotime("-1 Day"));
                        $d='%'.$day.'%';
                        $sql = "SELECT COUNT(foodname),foodname from orderlist WHERE finishtime LIKE '$d' GROUP BY foodname ORDER BY COUNT(foodname) DESC LIMIT 0,4";
                        $query=mysqli_query($conn,$sql);
                        while($rs=mysqli_fetch_array($query)){
                            echo $rs['foodname'].'<br/>';
                        }
                    ?>
                </div>
                <div class="modal-footer">  <!--Modal Footer -->
                    <?php unset($_SESSION['orderComplete']); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ตกลง</button>
                </div>
                </div>
            </div>
        </div>
    </head>
</html>