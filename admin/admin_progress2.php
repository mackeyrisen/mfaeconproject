<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

if($_GET['year']!="")
{
    $year = $_GET['year'];
}
else
{
    $year = $current[0];
}

$sql = "SELECT * FROM request WHERE  request_id LIKE '%$year'" ;
$query = $conn->query($sql);
/*$result = $query->fetch_array();*/

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE request_id LIKE '%$year' " ;
$query3 = $conn->query($sql3);
//$result3 = $query3->fetch_array();


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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">รายการสถานะ ปีงบประมาณ <?=$year+544 ;?></h1>
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
        <div class="row">
                <form action="?" method="GET">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-9">
                        <select name="year" class="form-control" >
                            <option value="<?php echo $current[0] ?>">-กรุณาเลือกปี-</option>
                                        <?php $j = date("Y");
                                            for ($i=$j; $i>=2017 ; $i--) { 
                                             $k = $i+544;
                                            echo "<option value='".$i."'>".$k."</option>" ;
                                        } ?>
                        </select>
                    </div>
                    <div class="col-sm-1"><button type="submit" class="btn btn-success">ค้นหา</button></div>
                </form>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>สถานะคำขอ</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ครัวไทย</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ฮาลาล</a>
                            </div>
                        </nav>
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <?php require 'content_kt.php' ?>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <?php require 'content_hl.php' ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

   <? foot()?>

</body>
</html>
