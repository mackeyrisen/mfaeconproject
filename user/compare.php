<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');


$sql ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

if($_GET['year']!="")
{
    $year = $_GET['year'];
}
else
{
    $year = $current[0];
}

$id = $_SESSION['user']."_".$year ;

$sql2 = "SELECT * FROM `request` WHERE request_id = '".$id."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE request_id = '".$id."'";
$query3 = $conn->query($sql3);
$result3 = $query3->fetch_array();

$sql4 = "SELECT * FROM `kruathai_backup` WHERE request_id = '".$id."'";
$query4 = $conn->query($sql4);
$kt_result = $query4->fetch_array();

$sql5 = "SELECT * FROM `halal_backup` WHERE  request_id = '".$id."'";
$query5 = $conn->query($sql5);
$hl_result = $query5->fetch_array();
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
                    <h1 style="font-family: TH SarabunPSK;font-weight:bolder;"><?=$result['2']?></h1>
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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">เปรียบเทียบโครงการ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>ปีงบประมาณ พ.ศ. <?=$year+544?></h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="GET">
                                    <label>เลือกปี: </label>
                                    <select class="form-control" name="year" >
                                        <option value="<?=$current[0] ?>">-กรุณาเลือกปี-</option>
                                        <? $j = $current[0]+1;
                                            for ($i=$j; $i>=2017 ; $i--) { 
                                             $k = $i+544;
                                            echo "<option value='".$i."'>".$k."</option>" ;
                                        } ?>
                                    </select>
                                    <button type="submit" class="btn btn-success">ค้นหา</button>
                                </form>
                                <hr>
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ครัวไทย</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ฮาลาล</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="card-body">
                                                <div class="custom-tab">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">คำขอ</a>
                                                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">เปลี่ยนแปลงโครงการ</a>
                                                            <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">เปลี่ยนแปลง 2</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                         <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                            <p>
                                                                <?php
                                                                    if($result2[0]!="")
                                                                    {
                                                                        require 'compare_kt1.php';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "-ไม่มีข้อมูล-" ;
                                                                    } 
                                                                    
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                            <p> 
                                                                <?
                                                                    if($kt_result[0]!="")
                                                                    {
                                                                        require 'compare_kt2.php';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "-ไม่มีข้อมูล-" ;
                                                                    } 
                                                                 ?>
                                                                    
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>-ไม่มีข้อมูล-</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="card-body">
                                                <div class="custom-tab">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home1" role="tab" aria-controls="custom-nav-home" aria-selected="true">คำขอ</a>
                                                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile1" role="tab" aria-controls="custom-nav-profile" aria-selected="false">เปลี่ยนแปลง 1</a>
                                                            <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact1" role="tab" aria-controls="custom-nav-contact" aria-selected="false">เปลี่ยนแปลง 2</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                         <div class="tab-pane fade show active" id="custom-nav-home1" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                            <p>
                                                                <?
                                                                    if($result3[0]!="")
                                                                    {
                                                                        require 'compare_hl1.php';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "-ไม่มีข้อมูล-" ;
                                                                    } 
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-nav-profile1" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                            <p>
                                                                <?
                                                                    if($hl_result[0]!="")
                                                                    {
                                                                        require 'compare_hl2.php';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "-ไม่มีข้อมูล-" ;
                                                                    } 
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="tab-pane fade" id="custom-nav-contact1" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                                            <p>-ไม่มีข้อมูล-</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
