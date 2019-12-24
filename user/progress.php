<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id = '".$_SESSION['user']."_".$current."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE `request_id` = '".$_SESSION['user']."_".$current."'";
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();


?>
<!doctype html>

<?php head(); ?>
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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">สถานะคำขอ</h1>
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
            <div class="card border border-primary">
                <div class="card-header">
                    <strong class="card-title">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</strong>
                </div>
                <div class="card-body">
                    <div class="row" align="center">
                <div class="col-sm-2"><i class="fa fa-upload"></i><br>ยื่นคำขอ</div>
            <!--    <div class="col-sm-2"><i class="fa fa-file-text"></i><br>รับเรื่อง</div> -->
                <div class="col-sm-2"><i class="fa fa-search"></i><br>กำลังพิจารณาคำขอ</div>
                <div class="col-sm-2"><i class="fa fa-file-o"></i><br>ผลการอนุมัติขอ</div>
                <div class="col-sm-2"><i class="fa fa-money"></i><br>โอนงบประมาณ </div>
            </div>

            <div class="row" align="center">
                <?if ($result['18']>="2") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i></div> <? } ?>
             <!--   <?if ($result['18']>="3") { ?> <div class="col-sm-2"><i class="fa fa-check"></i></div><? } ?> -->
                <?if ($result['18']>="4") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i></div><? } ?>
                <?if ($result['18']>="5") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i>ผ่านการอนุมัติ</div><? } 
                elseif($result['18']>="6"){?> <div class="col-sm-2" ><i class="fa fa-times"></i>ไม่ผ่านการอนุมัติ</div> <? } ?>
                <?if ($result['18']>="7") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i> <?php if($result['18']=="9"){ echo " (บางส่วน)"; } ?></div><? } ?>
            </div>
                </div>
            </div>
            
            

   <!--         <div class="row">
                <div class="col-sm-10">
                    <div class="progress mb-2">
                        <div class="progress-bar bg-primary" role="progressbar" 
                         style="width: <?php switch ($result[18]) {
                             case '1': echo '1'; break;
                             case '2': echo '20'; break;
                             case '3': echo '40'; break;
                             case '4': echo '60'; break;
                             case '4.5': echo '80'; break;
                             case '5': echo '80'; break;
                             case '6': echo '100';  break;
                             default: echo "0"; break;
                         } ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                     <?php switch ($result[18]) {
                             case '1': echo '0'; break;
                             case '2': echo '20'; break;
                             case '3': echo '40'; break;
                             case '4': echo '60'; break;
                             case '4.5': echo '80'; break;
                             case '5': echo '80'; break;
                             case '6': echo '100';  break;
                             default: echo "0"; break;
                         } ?>%</div>
                    </div>
                </div>
            </div> -->
            <hr>

            <div class="card border border-success">
                <div class="card-header">
                    <strong class="card-title">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</strong>
                </div>
                <div class="card-body">
                     <div class="row" align="center">
                <div class="col-sm-2"><i class="fa fa-upload"></i><br>ยื่นคำขอ</div>
              <!--  <div class="col-sm-2"><i class="fa fa-file-text"></i><br>รับเรื่อง</div> -->
                <div class="col-sm-2"><i class="fa fa-search"></i><br>กำลังพิจารณาคำขอ</div>
                <div class="col-sm-2"><i class="fa fa-file-o"></i><br>ผลการอนุมัติขอ</div>
                <div class="col-sm-2"><i class="fa fa-money"></i><br>โอนงบประมาณ </div>
            </div>

            <div class="row" align="center">
                <?if ($result3['18']>="2") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i></div> <? } ?>
             <!--   <?if ($result['18']>="3") { ?> <div class="col-sm-2"><i class="fa fa-check"></i></div><? } ?> -->
                <?if ($result3['18']>="4") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i></div><? } ?>
                <?if ($result3['18']>="5") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i>ผ่านการอนุมัติ</div><? } 
                elseif($result3['18']>="6"){?> <div class="col-sm-2" ><i class="fa fa-times" ></i>ไม่ผ่านการอนุมัติ</div> <? } ?>
                <?if ($result3['18']>="7") { ?> <div class="col-sm-2" ><i class="fa fa-check" style="color:red"></i><?php if($result3['18']=="9"){echo " (บางส่วน)" ;} ?></div><? } ?>
            </div>           
                </div>
            </div>
           

        <!--    <div class="row">
                <div class="col-sm-10">
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" 
                         style="width: <?php switch ($result3['status']) {
                             case '1': echo '1'; break;
                             case '2': echo '20'; break;
                             case '3': echo '40'; break;
                             case '4': echo '60'; break;
                             case '4.5': echo '80'; break;
                             case '5': echo '80'; break;
                             case '6': echo '100';  break;
                             default: echo "1"; break;
                         } ?>%" 
                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                     <?php switch ($result3['status']) {
                             case '1': echo '0'; break;
                             case '2': echo '20'; break;
                             case '3': echo '40'; break;
                             case '4': echo '60'; break;
                             case '4.5': echo '80'; break;
                             case '5': echo '80'; break;
                             case '6': echo '100';  break;
                             default: echo "0"; break;
                         } ?>%</div>
                    </div>
                </div>
            </div> -->
    
    
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot(); ?>

</body>
</html>
