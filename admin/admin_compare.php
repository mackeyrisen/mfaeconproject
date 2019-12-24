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

$id = $_SESSION['user']."_".$year ;

$sql= "SELECT * FROM kruathai_backup WHERE year ='$year' AND request_id NOT LIKE '%-1' " ;
$query= $conn->query($sql);

$sql3= "SELECT * FROM halal_backup WHERE year ='$year' AND request_id NOT LIKE '%-1'" ;
$query3= $conn->query($sql3);


$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql_compare = "SELECT * FROM member WHERE user NOT IN('globthailand','econ02') ORDER BY city ASC";
$query_compare = $conn->query($sql_compare);





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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">เปรียบเทียบโครงการอนุมัติ/เปลี่ยนแปลงโครงการ ปี<?=$year+544 ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
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
                <form action="?" method="GET">
                    <div class="col-sm-9">
                        <select name="year" class="form-control" >
                            <option value="<?=$current[0] ?>">-กรุณาเลือกปี-</option>
                                        <? $j = date("Y");
                                            for ($i=$j; $i>=2017 ; $i--) { 
                                             $k = $i+544;
                                            echo "<option value='".$i."'>".$k."</option>" ;
                                        } ?>
                        </select>
                    </div>
                    <div class="col-sm-1"><button type="submit" class="btn btn-success">ค้นหา</button></div>
                </form>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">โครงการครัวไทย</strong>
                        </div>
                        <div class="card-body">
                            <form action="admin_compare_view.php" method="POST" >
                                <select name="org" class="form-control">
                                    <?php 
                                        while($result = $query->fetch_array()){
                                            echo "<option value='$result[0]'>".$result[3]."</option>";
                                        }
                                    ?>
                                </select>
                                <hr>
                                <input type="hidden" name="type" value="1">
                                <button type="submit" class="btn btn-success">compare</button>
                            </form>   
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">โครงการฮาลาล</strong>
                        </div>
                        <div class="card-body">
                            <form action="admin_compare_view.php" method="POST" >
                                <select name="org" class="form-control">
                                    <?php 
                                        while($result3 = $query3->fetch_array()){
                                            echo "<option value='$result3[0]'>".$result3[3]."</option>";
                                        }
                                    ?>
                                </select>
                                <hr>
                                <input type="hidden" name="type" value="2">
                                <button type="submit" class="btn btn-success">compare</button>
                            </form>   
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">เปรียบเทียบโครงการระหว่างปี</h1>
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
            <div class="row" style="margin: 1px">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">โครงการครัวไทย</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>สอท./สกญ.</th>
                                    <th>ครัวไทย</th>
                                    <th>ฮาลาล</th>
                                </thead>
                                <tbody>
                                <?  $i = 1;
                                    while($compare = $query_compare->fetch_array()) { ?>
                                    <tr>
                                        <td>
                                        <?=$i ; ?>
                                        </td>
                                        <td>
                                        <?=$compare['city'] ; ?>
                                        </td>
                                        <td>
                                            <a href="admin_compare_view2.php?id=<?=$compare[1]?>&type=1" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"> เปรียบเทียบ</i></button></a>
                                        </td>
                                        <td>
                                            <a href="admin_compare_view2.php?id=<?=$compare[1]?>&type=2" target="_blank"><button class="btn btn-success"><i class="fa fa-eye"> เปรียบเทียบ</i></button> </a>
                                        </td>
                                    </tr>
                                <? $i++ ; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot();?>

</body>
</html>
