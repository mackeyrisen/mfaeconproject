<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include('dbconfig.php');

$sql = "SELECT * FROM request WHERE request_id = '".$_SESSION['user']."_".$current[0]."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

/*if($result[18]==2 OR $result[18]==3 OR $result[18]<=6){
    header("location:main.php");
}*/
?>
<!doctype html>
<? 	
	head();
	textrich();
?>

<body>


     <!-- Left Panel -->
     <? sidebar(); ?>

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
                        <h1 style="font-family:myFirstFont;font-size: 24px;font-weight: bold;">ร่างคำขอโครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</h1>
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
            <form action="save_request.php" method="POST">
            <div align="center" style="margin-top: 50px;font-family:myFirstFont;font-weight: bold;font-size: 24px;margin-left:75px;margin-right: 75px; ">
                คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. <?=$current[0]+544 ?> <br>
                งบรายจ่ายอื่น<br>
                โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ<br>
                
                <input class="form-control" type="hidden" name="typepro" value="โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ">
            </div>
            <br>
            <div style="font-family:myFirstFont;font-size: 20px ;margin-left:84px">
                <table class="table">
                    <tr>
                        <td style="font-weight: bold;" width="150px">หน่วยงานที่รับผิดชอบ</td>
                        <td><input class="form-control" type="hidden" name="org"  value="<?=$result2[2] ?>"><?=$result2[2] ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">แผนงานยุทธศาสตร์</td>
                        <td><input class="form-control" type="hidden" name="plan" value="พัฒนาความร่วมมือด้านต่างประเทศ สร้างและรักษาผลประโยชน์ของชาติ">พัฒนาความร่วมมือด้านต่างประเทศ สร้างและรักษาผลประโยชน์ของชาติ</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">กิจกรรม</td>
                        <td><input class="form-control" type="hidden" name="activity" value="ยกระดับขีดความสามารถในการแข่งขันและความร่วมมือทางเศรษฐกิจระหว่างประเทศ">ยกระดับขีดความสามารถในการแข่งขันและความร่วมมือทางเศรษฐกิจระหว่างประเทศ</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">ประเภทงบประมาณ</td>
                        <td><input class="form-control" type="hidden" name="type" value="งบรายจ่ายอื่น">งบรายจ่ายอื่น</td>
                        <input class="form-control" type="hidden" name="produce" value="">
                    </tr>
                   <!--  <tr>
                        <td style="font-weight: bold;">ผลผลิต/โครงการ</td>
                        <td><input class="form-control" type="hidden" name="produce" value="ผลผลิตที่ 1 ความสัมพันธ์ไทยกับประเทศต่าง ๆ ในกรอบทวิภาคี">ผลผลิตที่ 1 ความสัมพันธ์ไทยกับประเทศต่าง ๆ ในกรอบทวิภาคี</td>
                    </tr> -->
                    
                    <tr>
                        <td style="font-weight: bold;">งบประมาณที่ขอตั้ง (บาท) <font style="color: red">* ใส่เฉพาะตัวเลขเท่านั้น</font></td>
                        <td><input class="form-control" type="text" name="budget" value="<?=$result[4] ?>"></td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold;" width="150px">ชื่อโครงการ</td>
                        <td><input class="form-control" type="text" name="projname"  value="<?=$result[1] ?>"></td>
                    </tr>
                </table>
            </div>
            <br>
                <div class="container" style="margin-left:30px;margin-right:0px">
                    <p style="font-weight: bold;">1.หลักการและเหตุผล</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content1" name="principle" ><?=$result[9] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">2.วัตถุประสงค์</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content2" name="object" ><?=$result[10] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">3.เมือง/ประเทศที่จัด</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content3" name="location" value=""><?=$result[11] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">4.กลุ่มเป้าหมาย</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content4" name="target" value=""><?=$result[12] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">5.วิธีการดำเนินการ/โครงการย่อย</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content5" name="method" value=""><?=$result[13] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">6.ระยะเวลาดำเนินการ</p>
                    <div class="page-wrapper box-content">
                        <textarea class="content6" name="duration" value=""><?=$result[14] ?></textarea>
                    </div>
                    <hr>
                    <p style="font-weight: bold;color: black">7.ประมาณการค่าใช้จ่าย</p>
                    <div class="page-wrapper box-content" >
                        <textarea class="content7" name="pay" value=""><?=$result[15] ?></textarea>
                    </div>
                    <p style="font-weight: bold;color: black">8.ผลที่คาดว่าจะได้รับ</p>
                    <div class="page-wrapper box-content" >
                        <textarea class="content8" name="recieve" value=""><?=$result[16] ?></textarea>
                    </div>
                    <p style="font-weight: bold;">9.ผลการดำเนินการโครงการในปีที่ผ่านมา(หากมี)</p>
                    <div class="page-wrapper box-content" >
                        <textarea class="content9" name="pass" value=""><?=$result[17] ?></textarea>
                    </div>
                    <hr>

            </div>
            <input type="hidden" name="id" value="<?=$result[0] ?>">
             <button type="submit" class="btn btn-success">บันทึก</button>
            </form>
            <br>

            </div>
            
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <? foot() ?>
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
