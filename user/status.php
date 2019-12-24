<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id = '".$_SESSION['user']."_".$current[0]."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();
?>
<!doctype html>
<?php head() ?>
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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$current[0]+544 ?></h1>
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

        <!------------content--------------->

        <div class="content mt-3">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-8" style="margin-top: 50px;" id="printableArea">
            <div id="exportContent">
            <div align="center" style="margin-top: 20px;font-family:myFirstFont;font-weight: bold;font-size: 24px;margin-left:50px;margin-right: 50px; ">
                คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$current[0]+544 ?> <br>
                งบรายจ่ายอื่น<br>
                <?=$result[2] ?><br>
                
            </div>
            <br>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:1px">
                <table>
                    <tr>
                        <td style="font-weight: bold;" width="150px">หน่วยงานที่รับผิดชอบ</td>
                        <td><?=$result[3] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;" width="150px">ชื่อโครงการ</td>
                        <td><?=$result[1] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">งบประมาณที่ขอตั้ง</td>
                        <td><?=number_format($result[4]) ?>บาท</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">แผนงานยุทธศาสตร์</td>
                        <td><?=$result[8] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">กิจกรรม</td>
                        <td><?=$result[6] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">ประเภทงบประมาณ</td>
                        <td><?=$result[5] ?></td>
                    </tr>
                   <!-- <tr>
                        <td style="font-weight: bold;">ผลผลิต/โครงการ</td>
                        <td><?=$result[7] ?></td>
                    </tr> -->
                </table>
            </div>
            <br>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">1.หลักการและเหตุผล</div>
                <div>
                <?=$result[9] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">2.วัตถุประสงค์</div>
                <div>
                <?=$result[10] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">3.เมือง/ประเทศที่จัด</div>
                <div>
                <?=$result[11] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">4.กลุ่มเป้าหมาย</div>
                <div>
                <?=$result[12] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">5.วิธีการดำเนินการ/โครงการย่อย</div>
                <div>
                <?=$result[13] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">6.ระยะเวลาดำเนินการ</div>
                <div>
                <?=$result[14] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">7.ประมาณการค่าใช้จ่าย</div>
                <div>
                <?=$result[15] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">8.ผลที่คาดว่าจะได้รับ</div>
                <div>
                <?=$result[16] ?>
                </div>
            </div>
            <div style="font-family:myFirstFont;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">9.ผลการดำเนินการในปีที่ผ่านมา(หากมี)</div>
                <div>
                <?=$result[17] ?>
                </div>
            </div>

            </div>
        </div>
        <div class="col-sm-3" style="margin-top: 100px">
            <button class="btn btn-outline-primary btn-lg" type="button" onclick="printDiv('printableArea')"><span class="fa fa-print"></span> print</button> 
            <button class="btn btn-outline-primary btn-lg" type="button" onclick="Export2Doc('exportContent', 'word-content');"><span class="fa fa-save"></span> Word</button>
        </div>
            </div>
           
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php foot(); ?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
