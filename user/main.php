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

$sql4 = "SELECT * FROM `kruathai_backup` WHERE `request_id` = '".$_SESSION['user']."_".$current[0]."'";
$query4 = $conn->query($sql4);
$kb_result = $query4->fetch_array();

$sql5 = "SELECT * FROM `halal_backup` WHERE `request_id` = '".$_SESSION['user']."_".$current[0]."'";
$query5 = $conn->query($sql5);
$hb_result = $query5->fetch_array();


?>
<!doctype html>
<? head() ?>
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
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-family: myFirstFont;font-size: 24px;font-weight: bold;">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$current[0]+544 ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><!--content--></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="container" style="margin-top: 10px;font-family:myFirstFont">
                <p style="font-family: myFirstFont;font-size: 24px;font-weight: bold;color:black">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</p>
           
            <a <? if($result[18]=="" OR $result[18]==1 OR $result[18]==7){?> href="require.php"<?}?> >
                <button <?if($result[18]=="" OR $result[18]==1 OR $result[18]==7){?>class="btn btn-outline-primary btn-lg"
                <? } else{ ?> class="btn btn-primary btn-lg" <? } ?> >  
                    <i class="fa fa-file-text"></i>
            <? if($result[18]==""){?> ร่างคำขอโครงการครัวไทย 
            <? } elseif($result[18]==1 OR $result[18]==7){?>แก้ไขร่างคำขอครัวไทย
            <? } else{?>ยื่นคำขอเรียบร้อย<? }?></button></a>

            <? if($kb_result[0]!="") { ?>
                <a href="status_backup.php"><button class="btn btn-outline-primary btn-lg"><span class="fa fa-file-text"></span> คำขอเดิม</button></a>
            <? } ?>

            <? if($result[18]!="") { ?>
                <a href="status.php"><button class="btn btn-outline-primary btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a>
            <? } ?>    
            
         <!--   <button class="btn btn-primary btn-lg" ><i class="fa fa-check"></i> ยื่นคำขอเรียบร้อย</button>
            <a href="status.php"><button class="btn btn-outline-primary btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a>  
          
            <a href="require.php"><button class="btn btn-outline-primary btn-lg"><span class="ti-pencil"></span> แก้ไขร่างคำขอครัวไทย</button></a>
            <a href="status.php"><button class="btn btn-outline-primary btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a> -->
         
            
            </div>

            <div class="container" style="margin-top: 10px;font-family:myFirstFont">
                <p style="font-family: myFirstFont;font-size: 24px;font-weight: bold;color:black">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</p>

                <a <? if($result3[18]=="" OR $result3[18]==1 OR $result3[18]==7){?> href="halal.php"<?}?> >
                <button <?if($result3[18]=="" OR $result3[18]==1 OR $result3[18]==7){?>class="btn btn-outline-success btn-lg"
                <? } else{ ?> class="btn btn-success btn-lg" <? } ?> >  
                    <i class="fa fa-file-text"></i>
            <? if($result3[18]==""){?> ร่างคำขอโครงการฮาลาล
            <? } elseif($result3[18]==1 OR $result3[18]==7){?>แก้ไขร่างคำขอฮาลาล
            <? } else{?>ยื่นคำขอเรียบร้อย<? }?></button></a>

            <? if($hb_result[0]!="") { ?>
                <a href="halal_backup.php"><button class="btn btn-outline-success btn-lg"><span class="fa fa-file-text"></span> คำขอเดิม</button></a>
            <? } ?>

            <? if($result3[18]!="") { ?>
                <a href="halalprint.php"><button class="btn btn-outline-success btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a>
            <? } ?>    
            
          <!--  <? if($result3[1]==""){ ?>
            <a href="halal.php"><button class="btn btn-outline-success btn-lg"><i class="fa fa-file-text"></i> ร่างคำขอโครงการฮาลาล</button></a>
            <? } elseif($result3['status']==2) {?>
            //<button class="btn btn-success btn-lg" ><i class="fa fa-check"></i> ยื่นคำขอเรียบร้อย</button>//
            <a href="halal.php"><button class="btn btn-outline-success btn-lg"><span class="ti-pencil"></span> แก้ไขร่างคำขอฮาลาล</button></a>
            <a href="halalprint.php"><button class="btn btn-outline-success btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a>
            <? } else { ?>
            <a href="halal.php"><button class="btn btn-outline-success btn-lg"><span class="ti-pencil"></span> แก้ไขร่างคำขอฮาลาล</button></a>
            <a href="halalprint.php"><button class="btn btn-outline-success btn-lg"><span class="fa fa-print"></span> พิมพ์/ดาวน์โหลดคำขอ</button></a>
            <? } ?> -->

            
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <? foot(); ?>

</body>
</html>
