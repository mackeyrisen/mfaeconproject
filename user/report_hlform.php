<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include('dbconfig.php');

$sql = "SELECT * FROM request2 WHERE request_id LIKE '".$_SESSION['user']."%'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 ="SELECT * FROM halal_report WHERE report_id = '".$result[0]."'";
$query3 = $conn->query($sql3);
$kt_report = $query3->fetch_array();



?>
<!doctype html>
<? head();
textrich();
 ?>
<body>
<style>
    p{
            color: black;
            font-size: 20px;
            font-family: fonts;
        }
</style>

        <!-- Left Panel -->
        <? require 'sidebar.php' ?>
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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">รายงานผลการเบิกจ่ายและการดำเนินโครงการ</h1>
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

        <!--- Content -->
        <div class="content mt-3">
            <div class="container-fluid" style="margin-top: 50px;">
            <form action="save_hlreport.php" method="POST">
            <div align="center" style="margin-top: 50px;font-family:fonts;font-weight: bold;font-size: 24px;margin-left:75px;margin-right: 75px; ">
                รายงานผลการเบิกจ่ายและการดำเนินโครงการ (รายโครงการ) <br>
                ประจำปี 2562<br>
            </div>
            <br>
            <div style="font-family:fonts;font-size: 20px ;margin-left:84px">
                <table >
                    <tr>
                        <td style="font-weight: bold;" width="200px">ชื่องบประมาณ</td>
                        <td><?=$result[2] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">สอท./สกญ.</td>
                        <td><?=$result2[2] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">ชื่อโครงการ</td>
                        <td><input class="form-control" type="hidden" name="" value="<?=$result[2]?>"><?=$result[1]?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">งบประมาณที่ได้รับการจัดสรร </td>
                        <td><?=number_format($result[4]) ?> บาท</td>
                        <input type="hidden" name="budget" value="<?=$result[4]?>">
                    </tr>

                </table>
                <hr>
                <p style="font-weight: bold;">ผลการดำเนินงาน</p>
                <table class="table">
                    <p><i>กิจกรรมที่ 1</i> </p>
                    <tr>
                        <td width="200px">โครงการ/กิจกรรมย่อย</td>
                        <td><input type="textarea" class="form-control" name="project" value="<?=$kt_report[1] ?>"></td>
                    </tr>
                    <tr>
                        <td>ดำเนินการวันที่</td>
                        <td><input type="textarea" class="form-control" name="date" value="<?=$kt_report[6] ?>"></td>
                    </tr>
                    <tr>
                        <td>งบประมาณที่ใช้ (บาท)</td>
                        <td><input type="number"  name="used" step="0.01" style="width: 200px" value="<?=$kt_report[11] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้เข้าร่วมงาน (คน)</td>
                        <td><input type="number"  name="guest"  style="width: 200px" value="<?=$kt_report[16] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>สถานที่จัด</td>
                        <td><input type="textarea"  name="place"  class="form-control" value="<?=$kt_report[21] ?>"></td>
                    </tr>

                </table>
                <table class="table">
                    <p><i>กิจกรรมที่ 2 (ถ้ามี)</i> </p>
                    <tr>
                        <td width="200px">โครงการ/กิจกรรมย่อย</td>
                        <td><input type="textarea" class="form-control" name="project2" value="<?=$kt_report[2] ?>"></td>
                    </tr>
                    <tr>
                        <td>ดำเนินการวันที่</td>
                        <td><input type="textarea" class="form-control" name="date2" value="<?=$kt_report[7] ?>"></td>
                    </tr>
                    <tr>
                        <td>งบประมาณที่ใช้ (บาท)</td>
                        <td><input type="number"  name="used2" step="0.01" style="width: 200px" value="<?=$kt_report[12] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้เข้าร่วมงาน (คน)</td>
                        <td><input type="number"  name="guest2"  style="width: 200px" value="<?=$kt_report[17] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>สถานที่จัด</td>
                        <td><input type="textarea"  name="place2"  class="form-control" value="<?=$kt_report[22] ?>"></td>
                    </tr>
                    
                </table>

                <table class="table">
                    <p><i>กิจกรรมที่ 3 (ถ้ามี)</i> </p>
                    <tr>
                        <td width="200px">โครงการ/กิจกรรมย่อย</td>
                        <td><input type="textarea" class="form-control" name="project3" value="<?=$kt_report[3] ?>"></td>
                    </tr>
                    <tr>
                        <td>ดำเนินการวันที่</td>
                        <td><input type="textarea" class="form-control" name="date3" value="<?=$kt_report[8] ?>"></td>
                    </tr>
                    <tr>
                        <td>งบประมาณที่ใช้ (บาท)</td>
                        <td><input type="number"  name="used3" step="0.01" style="width: 200px" value="<?=$kt_report[13] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้เข้าร่วมงาน (คน)</td>
                        <td><input type="number"  name="guest3"  style="width: 200px" value="<?=$kt_report[18] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>สถานที่จัด</td>
                        <td><input type="textarea"  name="place3"  class="form-control" value="<?=$kt_report[23] ?>"></td>
                    </tr>
                    
                </table>
               <table class="table">
                    <p><i>กิจกรรมที่ 4 (ถ้ามี)</i> </p>
                    <tr>
                        <td width="200px">โครงการ/กิจกรรมย่อย</td>
                        <td><input type="textarea" class="form-control" name="project4" value="<?=$kt_report[4] ?>"></td>
                    </tr>
                    <tr>
                        <td>ดำเนินการวันที่</td>
                        <td><input type="textarea" class="form-control" name="date4" value="<?=$kt_report[9] ?>"></td>
                    </tr>
                    <tr>
                        <td>งบประมาณที่ใช้ (บาท)</td>
                        <td><input type="number"  name="used4" step="0.01" style="width: 200px" value="<?=$kt_report[14] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้เข้าร่วมงาน (คน)</td>
                        <td><input type="number"  name="guest4"  style="width: 200px" value="<?=$kt_report[19] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>สถานที่จัด</td>
                        <td><input type="textarea"  name="place4"  class="form-control" value="<?=$kt_report[24] ?>"></td>
                    </tr>
                    
                </table>
                <!-- <table class="table">
                    <p><i>กิจกรรมที่ 5 (ถ้ามี)</i> </p>
                    <tr>
                        <td width="200px">โครงการ/กิจกรรมย่อย</td>
                        <td><input type="textarea" class="form-control" name="project5" value="<?=$kt_report[5] ?>"></td>
                    </tr>
                    <tr>
                        <td>ดำเนินการวันที่</td>
                        <td><input type="textarea" class="form-control" name="date5" value="<?=$kt_report[10] ?>"></td>
                    </tr>
                    <tr>
                        <td>งบประมาณที่ใช้ (บาท)</td>
                        <td><input type="number"  name="used5" step="0.01" style="width: 200px" value="<?=$kt_report[15] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้เข้าร่วมงาน (คน)</td>
                        <td><input type="number"  name="guest5"  style="width: 200px" value="<?=$kt_report[20] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>สถานที่จัด</td>
                        <td><input type="textarea"  name="place5"  class="form-control" value="<?=$kt_report[25] ?>"></td>
                    </tr>
                    
                </table> -->
                
             <!--   <table class="table">
                    <tr>
                        <td>รวม คชจ. ทั้งโครงการ (บาท)</td>
                        <td><input type="number"  name="total" step="0.01" style="width: 200px" value="<?=$kt_report[26] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>งปม. คงเหลือ (บาท)</td>
                        <td><input type="number"  name="balance"  style="width: 200px" value="<?=$kt_report[27] ?>"><span class="validity"></span></td>
                    </tr>
                    <tr>
                        <td>ผลการเบิกจ่ายคิดเป็นร้อยละ</td>
                        <td><input type="number"  name="percent" step="0.01" style="width: 200px" value="<?=$kt_report[28] ?>"><span class="validity"></span></td>
                    </tr>
                </table>-->
            </div>
            <br>
                <div class="container" style="margin-left:30px;margin-right:0px">
                    <p style="font-weight: bold;">สรุปผล</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content1" name="A" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สรุปผล<br><?=$kt_report[29] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">2.1วัตถุประสงค์ที่ตั้งไว้</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content2" name="B" ><?=$kt_report[30] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">2.2.ผลการดำเนินงาน/ผลผลิต (Output) </p>
                    <div class="page-wrapper box-content">
                        <textarea class="content3" name="C" ><?=$kt_report[31] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">2.3สรุปผลลัพธ์โครงการ/กิจกรรม รวมทั้งความเชื่อมโยงกับยุทธศาสตร์ (Outcome)</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content4" name="D" ><?=$kt_report[32] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">-ความเชื่อมโยงกับยุทธศาสตร์</p>
                    <div class="page-wrapper box-content" align="Left">
                        
                        <label for="strategy1" class="radio-inline"> <input type="radio" name="E" value="1" id="strategy1" <?php if($kt_report[33]=="1"){echo "checked";}?> > การเพิ่มขีดความสามารถในการแข่งขันของผู้ประกอบธุรกิจฮาลาลไทย และขยายช่องทางการตลาดของสินค้า/ ธุรกิจฮาลาลในประเทศที่มีศักยภาพ</label> <br>
                        <input type="radio" name="E" value="2" id="strategy2" <?php if($kt_report[33]=="2"){echo "checked";}?>>
                        <label for="strategy2">การสร้างการรับรู้และเชื่อมั่นในตราสัญลักษณ์ฮาลาลไทย</label> <br>
                        <input type="radio" name="E" value="3" id="strategy3" <?php if($kt_report[33]=="3"){echo "checked";}?>>
                        <label for="strategy3">การกระชับความสัมพันธ์และดารเป็นพันธมิตรกับองค์กรมาตรฐานฮาลาลใน ตปท.</label>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">-การประเมินผลตามวัตถุประสงค์ที่ตั้งไว้ โดยเลือกเกณฑ์ใดหนึ่งดังนี้</p>
                    <div class="page-wrapper box-content" align="Left">
                        <input type="radio" name="F" value="1" id="vote1"  <?php if($kt_report[34]=="1"){echo "checked";}?>>
                        <label for="vote1">ระดับพอใช้ (ร้อยละ 70-79) </label> <br>
                        <input type="radio" name="F" value="2" id="vote2" <?php if($kt_report[34]=="2"){echo "checked";}?>>
                        <label for="vote2">ระดับดี (ร้อยละ 80-89)</label> <br>
                        <input type="radio" name="F" value="3" id="vote3" <?php if($kt_report[34]=="3"){echo "checked";}?>> 
                        <label for="vote3">ระดับดีมาก (ร้อยละ 90-100)</label>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">3. ปัญหาอุปสรรค</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content6" name="G" ><?=$kt_report[35]?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">4.แนวทางแก้ไข</p>
                    <div class="page-wrapper box-content" >
                        <textarea class="content7" name="H" ><?=$kt_report[36]?></textarea>
                    </div>
                    
                    <hr>

            </div>
             <button type="submit" class="btn btn-success">บันทึก</button>
            </form>
            <br>

            </div>
            
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <? foot(); ?>
    <script>
        $(document).ready(function() {
            $('.content1').richText();
        });

        $(document).ready(function() {
            $('.content2').richText();
        });

        $(document).ready(function() {
            $('.content3').richText();
        });

        $(document).ready(function() {
            $('.content4').richText();
        });

        $(document).ready(function() {
            $('.content5').richText();
        });

        $(document).ready(function() {
            $('.content6').richText();
        });

        $(document).ready(function() {
            $('.content7').richText();
        });

        $(document).ready(function() {
            $('.content8').richText();
        });

        $(document).ready(function() {
            $('.content9').richText();
        });
</script>

</body>
</html>
