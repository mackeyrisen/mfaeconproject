<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$org = $_POST['org'];
$type = $_POST['type'];

if($type==1){
$sql  = "SELECT * FROM kruathai_backup WHERE request_id ='$org'" ; 
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql3  = "SELECT * FROM request  WHERE request_id ='$org'" ; 
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();
}
elseif ($type==2) {
$sql  = "SELECT * FROM halal_backup WHERE request_id ='$org'" ; 
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql3  = "SELECT * FROM request2 WHERE request_id ='$org'" ; 
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();
}


$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();





?>
<!doctype html>
<? head(); ?>
<body>


        <!-- Left Panel -->

    <?php require 'sidebar_admin.php'; ?>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <h1 style="font-family: myFirstFont;font-weight:bolder;"><?=$result2['2']?></h1>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/user.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                               <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> -->

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                    
                    <div class="language-select dropdown" id="language-select">
                        <!--<i class="flag-icon flag-icon-th"></i> -->
                    </div>

                </div>

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-family: myFirstFont;font-size: 24px;font-weight: bold;">เปรียบเทียบโครงการ  <?=$result[3]?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><?=date("d/M/Y")?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-sm-12" >
                    <table class="table table-bordered" style="font-family:myFirstFont;font-size: 22px ;margin-left:1px">
                        <thead>
                            <th width="150px"></th>
                            <th width="444px">โครงการอนุมัติ</th>
                            <th>เปลี่ยนโครงการ</th>
                        </thead>
                        <tr>
                            <td style="font-weight: bold;">ชื่อโครงการ</td>
                            <td><?=$result[1]?></td>
                            <td><?=$result3[1]?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">งบประมาณที่ขอตั้ง</td>
                            <td><?=number_format($result[4]) ?>บาท</td>
                            <td><?=number_format($result3[4]) ?>บาท</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">แผนงานยุทธศาสตร์</td>
                            <td><?=$result[8] ?></td>
                         <td><?=$result3[8] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">กิจกรรม</td>
                            <td><?=$result[6] ?></td>
                            <td><?=$result3[6] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">ประเภทงบประมาณ</td>
                            <td><?=$result[5] ?></td>
                            <td><?=$result3[5] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">1.หลักการและเหตุผล</td>
                            <td><?=$result[9] ?></td>
                            <td><?=$result3[9] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">2.วัตถุประสงค์</td>
                            <td><?=$result[10] ?></td>
                            <td><?=$result3[10] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">3.เมือง/ประเทศที่จัด</td>
                            <td><?=$result[11] ?></td>
                            <td><?=$result3[11] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">4.กลุ่มเป้าหมาย</td>
                            <td><?=$result[12] ?></td>
                            <td><?=$result3[12] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">5.วิธีการดำเนินงาน/โครงการย่อย</td>
                            <td><?=$result[13] ?></td>
                            <td><?=$result3[13] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">6.ระยะเวลาดำเนินการ</td>
                            <td><?=$result[14] ?></td>
                            <td><?=$result3[14] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">7.ประมาณการค่าใช้จ่าย</td>
                            <td><?=$result[15] ?></td>
                            <td><?=$result3[15] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">8.ผลคาดว่าจะได้รับ</td>
                            <td><?=$result[16] ?></td>
                            <td><?=$result3[16] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">9.ผลการดำเนินการในปีที่ผ่านมา</td>
                            <td><?=$result[17] ?></td>
                            <td><?=$result3[17] ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <? foot(); ?>

</body>
</html>
