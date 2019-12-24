<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id LIKE '".$_SESSION['user']."%'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE `request_id` LIKE '".$_SESSION['user']."%'";
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();

$sql4 = "SELECT * FROM `kruathai_report` WHERE `report_id` LIKE '".$_SESSION['user']."%'";
$query4 = $conn->query($sql4);
$kt_report = $query4->fetch_array();

$sql5 = "SELECT * FROM `halal_report` WHERE `report_id` LIKE '".$_SESSION['user']."%'";
$query5 = $conn->query($sql5);
$hl_report = $query5->fetch_array();


?>
<!doctype html>
<? head(); ?>
<body>


        <!-- Left Panel -->

    <?php include 'sidebar.php';?>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <h1 style="font-family: TH SarabunPSK;font-weight:bolder;"><?=$result2['2']?></h1>
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
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">รายงานผลการเบิกจ่ายและการดำเนินโครงการ ประจำปี 2562</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="container" style="margin-top: 10px;font-family:myFirstFont">
                <p style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;color:black">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</p>
                <? if($kt_report["place5"]<="1") { ?>
                <a href="report_ktform.php">
                    <button class="btn btn-outline-primary btn-lg"><i class="fa fa-file-text"></i> รายงานผล</button>
                </a>
                <? } elseif($kt_report["place5"]=="2"){?>
                    <button class="btn btn-primary btn-lg"><i class="fa fa-file-text"></i> ยื่นรายงานเรียบร้อย</button>
                <? } ?>
                <? if($kt_report["place5"]=="1") { ?>
              
                    <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-file"></i> ยื่นรายงานผล</button>
                <? } ?>
            
                <? if($kt_report[0]!="") { ?>
                <a href="ktreport_view.php" target="_blank">
                    <button class="btn btn-outline-primary btn-lg"><i class="fa fa-print"></i> พิมพ์</button>
                </a> <? } ?>
            </div>
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    หลังจากยืนยันการรายงานผลแล้วจะไม่สามารถกลับไปแก้ไขคำขอได้ ถ้ามีความประสงค์ต้องการจะแก้ไขหลังจากทำการยืนยันไปแล้วให้ติดต่อเจ้าหน้าที่ศูนย์ธุกิจสัมพันธ์
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <a href="report_update.php?id=<?=$kt_report[0]?>" ><button type="button" class="btn btn-primary">ยืนยันการรายงานผล</button>
                            </div>
                        </div>
                    </div>
            </div>
<hr>
            <div class="container" style="margin-top: 10px;font-family:myFirstFont">
                <p style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;color:black">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</p>
                <? if($hl_report["place5"]<="1") { ?>
                <a href="report_hlform.php">
                    <button class="btn btn-outline-success btn-lg"><i class="fa fa-file-text"></i> รายงานผล</button>
                </a>
                <? } elseif($hl_report["place5"]=="2"){?>
                    <button class="btn btn-success btn-lg"><i class="fa fa-file-text"></i> ยื่นรายงานเรียบร้อย</button>
                <? } ?>
                <? if($hl_report["place5"]=="1") { ?>
              
                    <button class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#mediumModal2"><i class="fa fa-file"></i> ยื่นรายงานผล</button>
                <? } ?>
            
                <? if($hl_report[0]!="") { ?>
                <a href="hlreport_view.php" target="_blank">
                    <button class="btn btn-outline-success btn-lg"><i class="fa fa-print"></i> พิมพ์</button>
                </a> <? } ?>
            </div>
            <div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    หลังจากยืนยันการรายงานผลแล้วจะไม่สามารถกลับไปแก้ไขคำขอได้ ถ้ามีความประสงค์ต้องการจะแก้ไขหลังจากทำการยืนยันไปแล้วให้ติดต่อเจ้าหน้าที่ศูนย์ธุกิจสัมพันธ์
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <a href="report_update2.php?id=<?=$hl_report[0]?>" ><button type="button" class="btn btn-primary">ยืนยันการรายงานผล</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot(); ?>
</body>
</html>
