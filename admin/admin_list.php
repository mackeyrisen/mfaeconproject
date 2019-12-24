<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');



$sql = "SELECT * FROM member WHERE  user NOT IN('globthailand','econ02') ORDER BY city ASC" ;
$query = $conn->query($sql);
/*$result = $query->fetch_array();*/

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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">สอท./สกญ.</h1>
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
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                </div>
                <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                 <thead>
                                    <th>สอท./สกญ.</th>
                                    <th>ID</th>
                                    <th>รหัสผ่าน</th>  
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>voip</th>
                                    <th>email</th>   
                                </thead>
                                <tbody>
                                    <?while ($result = $query->fetch_array()) { ?>
                                    <tr>
                                        <td><?=$result[3]?></td>
                                        <td><?=$result[1]?></td>
                                        <td><?=base64_decode($result[4])?></td>
                                        <td><?=$result['u_name']?></td>
                                        <td><?=$result['u_lastname']?></td>
                                        <td><?=$result['u_voip']?></td>
                                        <td><?=$result['u_mail']?></td>
                                    </tr>
                                    <?} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

   <? foot()?>

</body>
</html>
