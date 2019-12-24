<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE status='1'";
$query = $conn->query($sql);
/*$result = $query->fetch_array();*/

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 = "SELECT * FROM `request2` WHERE status='1'";
$query3 = $conn->query($sql3);
//$result3 = $query3->fetch_array();

$linksql = "SELECT * FROM `link` ";
$linkquery = $conn->query($linksql);

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

        </header>
        <!-- /header -->
        
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-family: myFirstFont;font-size: 24px;font-weight: bold;">News</h1>
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
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">เพิ่มลิงก์</button>
            <hr>
            <!--Add Link-->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">เพิ่มลิงก์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="news_save.php" method="POST">
                            <div class="modal-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">ชื่อเรื่อง</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="ชื่อเรื่อง" class="form-control"><small class="form-text text-muted">ชื่อหัวข้อ</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">URL</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="url" placeholder="ลิงก์" class="form-control"><small class="form-text text-muted">example: https://mfaeconproject.com/news/</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">หมวดหมู่</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="category" id="select" class="form-control-sm form-control">
                                                <option value="0">-กรุณาเลือก-</option>
                                                <option value="1">ข้อมูลเชฟ</option>
                                                <option value="2">ฮาลาล</option>
                                                <option value="3">นวัตกรรมอาหาร</option>
                                                <option value="4">อีเว้นท์</option>
                                            </select>
                                        </div>
                                    </div>                           
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!--#Add Link-->

            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <th>No.</th>
                            <th>เรื่อง</th>
                            <th>การแสดงผล</th>
                            <th>หมวดหมู่</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </thead>
                        <tbody>
                        <?php 
                            $i = 1;
                            while($linkshow = $linkquery->fetch_array()){ ?>
                            <tr>
                                <td><?=$i; ?></td>
                                <td><a href="<?=$linkshow[2]; ?>" target="_blank"><?=$linkshow[1]; ?></a></td>
                                <td><?php if($linkshow[4]=="1"){echo"แสดง";} else{echo"ปิด";}?></td>
                                <td><?php if($linkshow[5]=="1"){echo"ข้อมูลเชฟ";}
                                            elseif($linkshow[5]=="2"){echo "ฮาลาล";}
                                            elseif($linkshow[5]=="3"){echo "นวัตกรรมอาหาร";}
                                            elseif($linkshow[5]=="4"){echo "อีเว้นท์";}
                                            else{echo "ไม่มีหมวดหมู่";}
                                    ?>                  
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#editnews<?=$i ?>"><i class="fa fa-pencil"></i></button>
                                    <?php include 'edit_news.php'; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#delnews<?=$i ?>"><i class="fa fa-trash-o"></i></button>
                                    <?php include 'del_news.php'; ?>
                                </td>
                                
                            </tr>
                        <?php   $i++; }  ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /#right-panel -->

    <!-- Right Panel -->

   <?php require 'foot.php'?>

</body>
</html>
