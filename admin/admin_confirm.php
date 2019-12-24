<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE status = 2 AND request_id LIKE '%$current[0]'" ;
$query = $conn->query($sql);
/*$result = $query->fetch_array();*/

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE status =2 AND request_id LIKE '%$current[0]'";
$query3 = $conn->query($sql3);
//$result3 = $query3->fetch_array();


?>
<!doctype html>
<? require 'head.php' ;?>
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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">รายการยื่นคำขอ</h1>
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
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</strong>
                            <form method="post" action="export.php">
                            	<input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                 <thead>
                                    <th>#</th>
                                    <th>สอท./สกญ.</th>
                                    <th>งบประมาณ ปี2562</th>   
                                </thead>
                                <tbody>
                                    <? 
                                    $no = 1;
                                    while ($result = $query->fetch_array()) { ?>
                                        <tr>
                                        <td>
                                        <?=$no ?>
                                         </td>
                                        <td>
                                        <?php 
                                        $org = str_replace("_".$current[0],"",$result[0]);
                                        $sql2 ="SELECT * FROM member WHERE user = '".$org."'";
                                        $query2 = $conn->query($sql2);
                                        $result2 = $query2->fetch_array();
                                        echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'>".$result2[2]."</a>";
                                        ?>
                                        </td>
                                        <td>
                                        <?=number_format($result[4]) ?>
                                        </td>
                                        </tr>
                                        <?  $no++ ;}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</strong>
                            <form method="post" action="export_halal.php">
                            	<input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                 <thead>
                                    <th>#</th>
                                    <th>สอท./สกญ.</th>
                                    <th>งบประมาณ ปี2562</th>   
                                </thead>
                                <tbody>
                                    <? 
                                    $no = 1;
                                    while ($result3 = $query3->fetch_array()) { ?>
                                        <tr>
                                        <td>
                                        <?=$no ?>
                                         </td>
                                        <td>
                                        <?php 
                                        $org = str_replace("_".$current[0],"",$result3[0]);
                                        $sql4 ="SELECT * FROM member WHERE user = '".$org."'";
                                        $query4 = $conn->query($sql4);
                                        $result4 = $query4->fetch_array();
                                        echo "<a href='halal_view.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'>".$result4[2]."</a>";
                                        ?>
                                        </td>
                                        <td>
                                        <?=number_format($result3[4]) ?>
                                        </td>
                                        </tr>
                                        <?  $no++ ;}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php require 'foot.php'?>

</body>
</html>
