<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');


$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$year = date('Y') +544 ;
$since = date('Y') + 542 ;

?>
<!doctype html>
<?php head() ?>
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
                        <h1 style="font-family: myFirstFont;font-size: 24px;font-weight: bold;">ตั้งค่าระบบทั่วไป</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"> </li>
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
                            <strong class="card-title mb-3">ปีงบประมาณ คำของบโครงการ</strong>
                        </div>
                        <div class="card-body">
                            <form action="save_year.php" method="POST" >
                                <select name="year" class="form-control">
                                  <?php 
                                    for ($i=$year; $i >=$since ; $i--) { 
                                         $j = $i - 544 ;
                                         if($j==$current[0]){
                                            echo "<option value ='$j' selected>".$i."</option>" ;
                                        }
                                         else{
                                            echo "<option value ='$j'>".$i."</option>" ;
                                        }
                                        
                                    }
                                  ?>
                                </select>
                                <hr>
                                <input type="hidden" name="oldyear" value="<?=$current[0] ?>">
                                <button type="submit" class="btn btn-success">save</button>
                            </form>   
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">ปีงบประมาณ รายงานผล</strong>
                        </div>
                        <div class="card-body">
                            <form action="save_year2.php" method="POST" >
                                <select name="year" class="form-control">
                                  <?php 
                                    for ($i=$year; $i >=$since ; $i--) { 
                                         $j = $i - 544 ;
                                         if($j==$current[1]){
                                            echo "<option value ='$j' selected>".$i."</option>" ;
                                        }
                                         else{
                                            echo "<option value ='$j'>".$i."</option>" ;
                                        }
                                        
                                    }
                                  ?>
                                </select>
                                <hr>
                                <input type="hidden" name="oldyear" value="<?=$current[1] ?>">
                                <button type="submit" class="btn btn-success">save</button>
                            </form>   
                            
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot(); ?>

</body>
</html>
