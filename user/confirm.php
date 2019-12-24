<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id = '".$_SESSION['user']."_".$current[0]."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE `request_id` = '".$_SESSION['user']."_".$current[0]."'";
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();


?>
<!doctype html>
<?php head(); ?>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">MFA Thailand</a>
                <a class="navbar-brand hidden" href="./">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="main.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">คำขอ</h3><!-- /.menu-title -->
                    <li>
                        <a href="main.php"> <i class="menu-icon fa fa-file-text"></i>ร่างคำขอ</a>
                    </li>
                    <li>
                        <a href="confirm.php"> <i class="menu-icon fa fa-upload"></i>ยื่นคำขอ</a>
                    </li>
                    <li>
                        <a href="progress.php"> <i class="menu-icon fa fa-tasks"></i>สถานะคำขอ</a>
    
                    </li>

                    <h3 class="menu-title">รายงานผล</h3><!-- /.menu-title -->

                    <li>
                        <a href="report.php"> <i class="menu-icon fa fa-bar-chart-o"></i>รายงานผล</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-columns"></i>เปรียบโครงการ</a>
                    </li>
                    
                    <h3 class="menu-title">ตั้งค่า</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>ผู้ใช้</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-list-alt"></i><a href="#">Profile</a></li>
                            <li><i class="menu-icon fa fa-sign-out"></i><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.php"> <i class="menu-icon fa fa-comments-o"></i>ติดต่อ</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <h1 style="font-family:myFirstFont;font-weight:bolder;"><?=$result2['2']?></h1>
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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">ยื่นคำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$current[0]+544 ?></h1>
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
            <? if($result[18]==1||$result[18]==7){?>
            <button class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-file-text"></i> ยื่นคำขอโครงการครัวไทย</button>
            <? } elseif($result[18]>=2 /*|| $result[18]<=6 */||$result[18]==8) {?>
            <button class="btn btn-primary btn-lg"> <i class="fa fa-check"></i> ยื่นคำขอเรียบร้อย</button>  <? } ?>
            </div> 
            <hr>
            <div class="container" style="margin-top: 10px;font-family:myFirstFont">
                <p style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;color:black">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</p>
            <? if($result3[18]==1||$result3[18]==7){?>
            <button class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#mediumModal2"><i class="fa fa-file-text"></i> ยื่นคำขอโครงการฮาลาล</button>
            <? } elseif($result3[18]>=2 /*|| $result3[18]<=6*/ ||$result3[18]==8) {?>
            <button class="btn btn-success btn-lg"> <i class="fa fa-check"></i> ยื่นคำขอเรียบร้อย</button>  <? } ?>
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
                                    หลังจากยืนยันคำแล้วจะไม่สามารถกลับไปแก้ไขคำขอได้ ถ้ามีความประสงค์ต้องการจะแก้ไขหลังจากทำการยืนยันไปแล้วให้ติดต่อเจ้าหน้าที่ศูนย์ธุกิจสัมพันธ์
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <a href="confirm_update.php?id=<?=$result[0]?>&status=<?=$result[18]?>"><button type="button" class="btn btn-primary">ยืนยันการยื่นคำขอ</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    หลังจากยืนยันคำแล้วจะไม่สามารถกลับไปแก้ไขคำขอได้ ถ้ามีความประสงค์ต้องการจะแก้ไขหลังจากทำการยืนยันไปแล้วให้ติดต่อเจ้าหน้าที่ศูนย์ธุกิจสัมพันธ์
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <a href="confirm_update.php?id2=<?=$result3[0]?>&status2=<?=$result3[18]?>"><button type="button" class="btn btn-primary">ยืนยันการยื่นคำขอ</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <? foot(); ?>

</body>
</html>
