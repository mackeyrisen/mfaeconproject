<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE  request_id LIKE '%$current[0]'" ;
$query = $conn->query($sql);
/*$result = $query->fetch_array();*/

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE request_id LIKE '%$current[0]' " ;
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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">รายการสถานะ ปีงบประมาณ <?=$current[0]+544 ;?></h1>
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
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                 <thead>
                                    <th>#</th>
                                    <th>สอท./สกญ.</th>
                                    <th>สถานะ</th>  
                                    <th>โครงการที่อนุมัติ</th>
                                    <th>เปลี่ยนแปลงโครงการ</th>   
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
                                        echo $result2['city'];
                                        ?>
                                        </td>
                                        <td>
                                        <? if($result[18]==1)
                                            {
                                                echo "ร่างคำขอ";
                                            }
                                            elseif ($result[18]==2) 
                                            {
                                               echo "ยื่นคำขอ";  
                                            }
                                            elseif ($result[18]==3) 
                                            {
                                               echo "รับเรื่อง";  
                                            }
                                            elseif ($result[18]==4) 
                                            {
                                               echo "พิจารณา";  
                                            }elseif ($result[18]==5) 
                                            {
                                               echo "ไม่อนุมัติ";  
                                            }
                                            elseif ($result[18]==6) 
                                            {
                                               echo "อนุมัติ";  
                                            }
                                            elseif ($result[18]==7) 
                                            {
                                               echo "แก้ไขคำขอ";  
                                            }
                                            elseif ($result[18]==8) 
                                            {
                                               echo "<p style='color:red'>โอนงบเรียบร้อย</p>";  
                                            }
                                            elseif ($result[18]==9) 
                                            {
                                               echo "<p style='color:red'>โอนงบบางส่วน</p>";  
                                            }               

                                        ?>
                                        </td>
                                        <td>
                                        	<?php 
                                        			$sqlkt = "SELECT * FROM `kruathai_backup` WHERE request_id ='".$result[0]."'";
                                        			$querykt = $conn->query($sqlkt);
                                        			$resultkt= $querykt->fetch_array();
                                        			if($resultkt[0] == $result[0]){
                                        				
                                        				echo "<a href='kruathai_view2.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        			else{
                                        				echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
                                        </td>
                                        <td>
                                        	<?php 
                                        			$sqlkt = "SELECT * FROM `kruathai_backup` WHERE request_id ='".$result[0]."'";
                                        			$querykt = $conn->query($sqlkt);
                                        			$resultkt= $querykt->fetch_array();
                                        			if($resultkt[0] == $result[0]){
                                        				
                                        				echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
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
                                    <th>สถานะ</th>
                                    <th>โครงการที่อนุมัติ</th>
                                    <th>เปลี่ยนแปลงโครงการ</th>   
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
                                        echo $result4[3];
                                        ?>
                                        </td>
                                        <td>
                                        <?
                                        if($result3[18]==1)
                                            {
                                                echo "ร่างคำขอ";
                                            }
                                            elseif ($result3[18]==2) 
                                            {
                                               echo "ยื่นคำขอ";  
                                            }
                                            elseif ($result3[18]==3) 
                                            {
                                               echo "รับเรื่อง";  
                                            }
                                            elseif ($result3[18]==4) 
                                            {
                                               echo "พิจารณา";  
                                            }elseif ($result3[18]==5) 
                                            {
                                               echo "ไม่อนุมัติ";  
                                            }
                                            elseif ($result3[18]==6) 
                                            {
                                               echo "อนุมัติ";  
                                            }
                                            elseif ($result3[18]==7) 
                                            {
                                               echo "แก้ไขคำขอ";  
                                            }
                                            elseif ($result3[18]==8) 
                                            {
                                               echo "<p style='color:red'>โอนงบเรียบร้อย</p>";  
                                            }
                                            elseif ($result3[18]==9) 
                                            {
                                               echo "<p style='color:red'>โอนงบบางส่วน</p>";  
                                            }               
                                        ?>
                                        </td>
                                         <td>
                                        	<?php 
                                        			$sqlhl = "SELECT * FROM `halal_backup` WHERE request_id ='".$result3[0]."'";
                                        			$queryhl = $conn->query($sqlhl);
                                        			$resulthl= $queryhl->fetch_array();
                                        			if($resulthl[0] == $result3[0]){
                                        				
                                        				echo "<a href='halal_view2.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        			else{
                                        				echo "<a href='halal_view.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
                                        </td>
                                        <td>
                                        	<?php 
                                        			$sqlhl = "SELECT * FROM `halal_backup` WHERE request_id ='".$result3[0]."'";
                                        			$queryhl = $conn->query($sqlhl);
                                        			$resulthl= $queryhl->fetch_array();
                                        			if($resulthl[0] == $result3[0]){
                                        				
                                        				echo "<a href='halal_view.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
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

   <? foot()?>

</body>
</html>
