<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id LIKE '".$_SESSION['user']."%'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$link1 = "SELECT * FROM link WHERE category = '1' AND status= '1' ORDER BY link_id DESC" ;
$querylink1 = $conn->query($link1);

$link2 = "SELECT * FROM link WHERE category = '2' AND status= '1' ORDER BY link_id DESC" ;
$querylink2 = $conn->query($link2);

$link3 = "SELECT * FROM link WHERE category = '3' AND status= '1' ORDER BY link_id DESC" ;
$querylink3 = $conn->query($link3);

$link4 = "SELECT * FROM link WHERE category = '4' AND status= '1' ORDER BY link_id DESC" ;
$querylink4 = $conn->query($link4);


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
                        <h1 style="font-family: myFirstFont;font-size: 24px;font-weight: bold;">Informations</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><!----></li>
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
                            <strong class="card-title mb-3">พ่อครัวแม่ครัวไทย</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="mx-auto d-block" src="images/Chef.jpg"  alt="Card image cap">
                            </div>
                            <hr>
                            <?php while($linkshow1 = $querylink1->fetch_array()){ ?>
                            <div class="card-text">
                                <i class="fa fa-file pr-1"></i>
                                <a href="<?=$linkshow1[2] ?>" target="_blank"><?=$linkshow1[1] ?></a>
                            </div>
                            <hr>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">ฮาลาล</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="mx-auto d-block" src="images/halal.jpg" alt="Card image cap">
                            </div>
                            <hr>
                            <?php while($linkshow2 = $querylink2->fetch_array()){ ?>
                            <div class="card-text">
                                <i class="fa fa-file pr-1"></i>
                                <a href="<?=$linkshow2[2] ?>" target="_blank"><?=$linkshow2[1] ?></a>
                            </div>
                            <hr>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">ผลิตภัณฑ์อาหารนวัตกรรม</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="mx-auto d-block" src="images/product.jpg" alt="Card image cap">
                            </div>
                            <hr>
                            <?php while($linkshow3 = $querylink3->fetch_array()){ ?>
                            <div class="card-text">
                                <i class="fa fa-file pr-1"></i>
                                <a href="<?=$linkshow3[2] ?>" target="_blank"><?=$linkshow3[1] ?></a>
                            </div>
                            <hr>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">งานแสดงสินค้าในต่างประเทศ</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="mx-auto d-block" src="images/event.jpg" alt="Card image cap">
                            </div>
                            <hr>
                            <?php while($linkshow4 = $querylink4->fetch_array()){ ?>
                            <div class="card-text">
                                <i class="fa fa-file pr-1"></i>
                                <a href="<?=$linkshow4[2] ?>" target="_blank"><?=$linkshow4[1] ?></a>
                            </div>
                            <hr>
                            <?php }?>
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
