<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$id = $_GET['id'];
$user = $_GET['user'];

$sql = "SELECT * FROM kruathai_backup WHERE request_id LIKE '".$id."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$user."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();
?>
<!doctype html>
<? head() ?>
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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$result['year']+544 ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right" align="right">
                            <li class="active">
                            	สถานะ : <?php if ($result[18]==1) {echo "ร่างคำขอ";}
                                elseif ($result[18]==2) {echo "ยื่นคำขอ";}
                            	elseif($result[18]==3){echo "รับเรื่อง";} 
                            	elseif($result[18]==4){echo "พิจารณา";}
                            	elseif($result[18]==5){echo "ไม่อนุมัติ";}
                                elseif($result[18]==6){echo "อนุมัติ";}
                                elseif($result[18]==7){echo "แก้ไขคำขอ";}
                                elseif($result[18]==8){echo "โอนงบประมาณ";}
                                elseif($result[18]==9){echo "โอนงบบางส่วน";}
                            	 ?>
                            		
                            </li>
                        </ol>
                    <a href="kruathai_view.php?id=<?=$id?>&user=<?=$user?>">
                        <button class="btn btn-outline-primary"><i class="fa fa-file-text"></i> คำขอใหม่</button>
                        </a>    
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">แก้ไขสถานะ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="status_update.php" method="POST">
                            <div class="modal-body">
                            	<input type="radio" name="status" value="1" <? if($result[18]==1){echo "checked" ;} ?> >ร่างคำขอ</option>
                                <input type="radio" name="status" value="2" <? if($result[18]==2){echo "checked" ;} ?> >ยื่นคำขอ</option>
                                <input type="radio" name="status" value="3" <? if($result[18]==3){echo "checked" ;} ?> >รับเรื่อง</option>
                                <input type="radio" name="status" value="4" <? if($result[18]==4){echo "checked" ;} ?> >พิจารณา</option>
                                <input type="radio" name="status" value="5" <? if($result[18]==5){echo "checked" ;} ?> >ไม่อนุมัติ</option>
                                <input type="radio" name="status" value="6" <? if($result[18]==6){echo "checked" ;} ?> >อนุมัติ</option>
                                <input type="radio" name="status" value="7"<? if($result[18]==7){echo "checked" ;} ?> >แก้ไขคำขอ</option>
                                <input type="radio" name="status" value="8" <? if($result[18]==8){echo "checked" ;} ?> >โอนเงินประมาณ</option>
                                <input type="radio" name="status" value="9" <? if($result[18]==9){echo "checked" ;} ?> >โอนงบบางส่วน</option>
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="user" value="<?=$user?>">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">ยืนยันการยื่นคำขอ</button>
                            </div>
                        </form>
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
                <font color="red">(ฉบับเดิม)</font><br>
                คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$result['year']+544; ?>  <br>
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
                <div style="font-weight: bold;">8.ผลคาดว่าที่จะได้รับ</div>
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

<? foot(); ?>
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
