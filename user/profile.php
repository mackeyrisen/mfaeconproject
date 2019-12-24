<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');


$sql ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">ข้อมูลผู้ใช้</h1>
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
                     <strong>แก้ไข้ข้อมูล</strong>
                  </div>
                <div class="card-body card-block">
                    <form action="save_profile.php" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">หน่วยงาน</div>
                            <div class="col-12 col-md-9"><?=$result[2] ?></div>
                         </div>
                        <div class="row form-group">
                            <div class="col col-md-3">ID</div>
                            <div class="col-12 col-md-9"><?=$result[1] ?></div>
                         </div>
                        <div class="row form-group">
                            <div class="col col-md-3">Password</div>
                            <div class="col-12 col-md-9"><input type="text"  name="password" class="form-control" value="<?=base64_decode($result['password']) ?>" ></div>
                        </div>
                        <hr>
                        <p >ข้อมูลเจ้าหน้าที่</p>
                        <div class="row form-group">
                            <div class="col col-md-3">ชื่อ</div>
                            <div class="col-12 col-md-9"><input type="text"  name="name" class="form-control" value="<?=$result['u_name'] ?>" ></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">นามสกุล</div>
                            <div class="col-12 col-md-9"><input type="text"  name="lastname" class="form-control" value="<?=$result['u_lastname'] ?>" ></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">VOIP</div>
                            <div class="col-12 col-md-9"><input type="text"  name="voip" class="form-control" value="<?=$result['u_voip'] ?>" ></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">e-mail</div>
                            <div class="col-12 col-md-9"><input type="email"  name="email" class="form-control" value="<?=$result['u_mail'] ?>" ></div>
                        </div>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3">
                            <input type="hidden" name="id" value="<?=$result['id'] ?>">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> บันทึก
                            </button>
                            </div>
                            <div class="col-12 col-md-9">
                                <? if($_GET['success']=="on")
                                    {
                                     require 'ui-alert.php';
                                } ?>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot(); ?>
</body>
</html>
