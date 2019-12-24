<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

$sql = "SELECT * FROM request2 WHERE request_id LIKE '".$_SESSION['user']."%'";
$query = $conn->query($sql);
$result = $query->fetch_array();

$sql2 ="SELECT * FROM member WHERE user = '".$_SESSION['user']."'";
$query2 = $conn->query($sql2);
$result2 = $query2->fetch_array();

$sql3 ="SELECT * FROM halal_report WHERE report_id = '".$result[0]."'";
$query3 = $conn->query($sql3);
$kt = $query3->fetch_array();

if ($kt[2]!=""&&$kt[3]==""&&$kt[4]==""&&$kt[5]=="") {
    $rs = "rowspan='2'" ;
}
elseif ($kt[2]!=""&&$kt[3]!=""&&$kt[4]==""&&$kt[5]=="") {
    $rs = "rowspan='3'" ;
}
elseif ($kt[2]!=""&&$kt[3]!=""&&$kt[4]!=""&&$kt[5]=="") {
    $rs = "rowspan='4'" ;
}
elseif ($kt[2]!=""&&$kt[3]!=""&&$kt[4]!=""&&$kt[5]!="") {
    $rs = "rowspan='5'" ;
}
else{
    $rs = " ";
}
?>
<!doctype html>
<?php head(); ?>
<style>
    @font-face 
    {
        font-family: THSarabunIT๙;
        src: url(fonts/THSarabunIT๙.ttf);
    }
    @font-face 
    {
        font-family: fonts;
        src: url(fonts/THSarabunNew.ttf);
    }
    p{
        color:black;
    }
    .tg{
        font-family: fonts ;
        font-size: 20px;
        border-color:black;
        border-style:solid;
        border-width:1px;
    }
        .tg2{
            font-family: fonts ;
            font-size: 20px;
        }
</style>
    
<script type="text/javascript">
        function Export2Doc(element, filename = ''){
    var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    var postHtml = "</body></html>";
    var html = preHtml+document.getElementById(element).innerHTML+postHtml;

    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.doc':'document.doc';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadink);
}
</script>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">MFA Thailand</a>
                <a class="navbar-brand hidden" href="./">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="main.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">คำขอ</h3><!-- /.menu-title -->
                    <li>
                        <a href="main.php"> <i class="menu-icon fa fa-file-text"></i>ร่างคำขอ</a>
                    </li>
                    <li>
                        <a href="confirm.php"> <i class="menu-icon fa fa-upload"></i>ยื่นคำขอ</a>
                    </li>
                    <li>
                        <a href="progress.php"> <i class="menu-icon fa fa-tasks"></i>สถานะคำขอ</a>
    
                    </li>

                    <h3 class="menu-title">รายงานผล</h3><!-- /.menu-title -->

                    <li>
                        <a href="report.php"> <i class="menu-icon fa fa-bar-chart-o"></i>รายงานผล</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-columns"></i>เปรียบโครงการ</a>
                    </li>
                    
                    <h3 class="menu-title">ตั้งค่า</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>ผู้ใช้</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-list-alt"></i><a href="#">Profile</a></li>
                            <li><i class="menu-icon fa fa-sign-out"></i><a href="logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.php"> <i class="menu-icon fa fa-comments-o"></i>ติดต่อ</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

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
                        <h1 style="font-family: TH SarabunPSK;font-size: 22px;font-weight: bold;">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. 2562</h1>
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
            <div align="center" style="margin-top: 20px;font-family:fonts;font-weight: bold;font-size: 24px;margin-left:50px;margin-right: 50px; ">
                รายงานผลการเบิกจ่ายและการดำเนินโครงการ (รายโครงการ) <br>
                ประจำปี 2562<br>
                
                
            </div>
            <br>
            <div style="font-family:fonts;font-size: 20px ;margin-left:1px">
                <table>
                    <tr>
                        <td> <b>ชื่องบประมาณ</b>: <?=$result[2] ?></td>
                        
                    </tr>
                    <tr>
                        <td> <b>สอท./สกญ.</b>: <?=$result[3] ?></td>
                        
                    </tr>
                    <tr>
                        <td><b> ชื่อโครงการ</b>: <?=$result[1] ?></td>
                        
                    </tr>
                    <tr>
                        <td><b> งบประมาณที่ได้รับการจัดสรร</b>: <?=number_format($result[4]) ?> บาท </td>
                        
                    </tr>
                    
                </table>
            </div>
            <div> <br>
                <p style="font-family:fonts; font-size:20px;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผลการดำเนินงาน</p>
                <table>
                    <tr>
                        <td ></td>
                        <td ></td>
                        <td class="tg" width="100px" align="center">ดำเนินการวันที่</td>
                        <td class="tg" width="100px" align="center">งบประมาณที่ใช้ (บาท)</td>
                        <td class="tg" width="100px" align="center">จำนวนผู้เข้าร่วม (คน)</td>
                        <td class="tg" width="120px" align="center">สถานที่จัด</td>
                    </tr>
                    <tr class="tg">
                        <td class="tg" <?=$rs ?> width="140px" align="top"><b>&nbsp;&nbsp;โครงการ/กิจกรรมย่อย</b> </td>
                        <td class="tg" width="200px">&nbsp;&nbsp;<?=$kt[1] ?></td>
                        <td class="tg" align="center" ><?=$kt[6] ?></td>
                        <td class="tg" align="center"><?=number_format($kt[11],2) ?></td>
                        <td class="tg" align="center"><?=number_format($kt[16]) ?></td>
                        <td class="tg" align="center"><?=$kt[21] ?></td>
                    </tr>
                    <? if($kt[2]!="") { ?>
                    <tr >
                        <td class="tg">&nbsp;&nbsp;<?=$kt[2] ?></td>
                        <td class="tg" align="center"><?=$kt[7] ?></td>
                        <td class="tg" align="center"><?=number_format($kt[12],2) ?></td>
                        <td class="tg" align="center"><?=number_format($kt[17]) ?></td>
                        <td class="tg" align="center"><?=$kt[22] ?></td>
                    </tr>
                   <? } ?>
                   <? if($kt[3]!="") { ?>
                        <tr >
                        <td class="tg">&nbsp;&nbsp;<?=$kt[3] ?></td>
                        <td class="tg" align="center"><?=$kt[8] ?></td>
                        <td class="tg" align="center"><?=number_format($kt[13],2) ?></td>
                        <td class="tg" align="center"><?=number_format($kt[18]) ?></td>
                        <td class="tg" align="center"><?=$kt[23] ?></td>
                    </tr>
                   <? } ?>
                   <? if($kt[4]!="") { ?>
                        <tr >
                        <td class="tg">&nbsp;&nbsp;<?=$kt[4] ?></td>
                        <td class="tg" align="center"><?=$kt[9] ?></td>
                        <td class="tg" align="center"><?=number_format($kt[14],2) ?></td>
                        <td class="tg" align="center"><?=number_format($kt[19]) ?></td>
                        <td class="tg" align="center"><?=$kt[24] ?></td>
                    </tr>
                   <? } ?>
                   <? if($kt[5]!="") { ?>
                        <tr >
                        <td class="tg">&nbsp;&nbsp;<?=$kt[5] ?></td>
                        <td class="tg" align="center"><?=$kt[10] ?></td>
                        <td class="tg" align="center"><?=number_format($kt[15],2) ?></td>
                        <td class="tg" align="center"><?=number_format($kt[20]) ?></td>
                        <td class="tg" align="center"><?=$kt[25] ?></td>
                    </tr>
                   <? } ?>
                    <tr class="tg">
                        <td colspan="2" class="tg"><b>&nbsp;&nbsp;รวม คชจ. ทั้งโครงการ (บาท)</b></td>
                        <td colspan="4"><?=number_format($kt[26],2)?></td>
                    </tr>
                    <tr class="tg">
                        <td colspan="2" class="tg"><b>&nbsp;&nbsp;งปม. คงเหลือ (บาท)</b></td>
                        <td colspan="4" class="tg"><?=number_format($kt[27],2) ?></td>
                    </tr>
                    <tr class="tg">
                        <td colspan="2" class="tg"><b>&nbsp;&nbsp;ผลการเบิกจ่ายคิดเป็นร้อยละ</b></td>
                        <td colspan="4" class="tg"><?=number_format($kt[28],2) ?></td>
                    </tr>
                    <tr class="tg">
                        <td colspan="6" ><?=$kt[29]?></td> 
                    </tr>
                </table>
            </div> 
            <br>
            <div class="tg2">
                <p style="font-size: 20px ;font-weight:bold;padding-top: 10px;">2.1วัตถุประสงค์ที่ตั้งไว้</p>
                <p><?=$kt[30]?><p>
                <p style="font-size: 20px ;font-weight:bold;">2.2ผลการดำเนินงาน/ผลผลิต (Output)</p>
                <p><?=$kt[31]?><p>
                <p style="font-size: 20px ;font-weight:bold;">
                2.3สรุปผลลัพธ์โครงการกิจกรรม รวมทั้งความเชื่อโยงกับศาสตร์  (Outcome)</p>
                <p><?=$kt[32]?><p>
                
                <form>
                    <p style="font-size: 20px ;">- ความเชื่อโยงกับยุทธศาสตร์</p>
                    <?php if($kt[33]==1){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     การเพิ่มขีดความสามารถในการแข่งขันของผู้ประกอบธุรกิจฮาลาลไทย และขยายช่องทางการตลาดของสินค้า/ ธุรกิจฮาลาลในประเทศที่มีศักยภาพ  <br>
                     <?php if($kt[33]==2){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     การสร้างการรับรู้และเชื่อมั่นในตราสัญลักษณ์ฮาลาลไทย <br>
                     <?php if($kt[33]==3){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     การกระชับความสัมพันธ์และดารเป็นพันธมิตรกับองค์กรมาตรฐานฮาลาลใน ตปท. <br>
                </form>
                <br>
                <form>
                    <p style="font-size: 20px ;">- การประเมินผลตามวัตถุประสงค์</p>
                    <?php if($kt[34]==1){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     ระดับพอใช้ (ร้อยละ 70-79) &nbsp; &nbsp;
                     <?php if($kt[34]==2){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     ระดับดี (ร้อยละ 80-89)  &nbsp; &nbsp;
                     <?php if($kt[34]==3){?>
                    <span class="fa fa-check" style="font-size: 14px ;"></span><? } else {?>
                    <input type="checkbox" disabled> <?php } ?>
                     ระดับดีมาก (ร้อยละ 90-100)

                </form>
            </div>
            <br>
            <div style="font-family: fonts;font-size: 20px ;margin-left:10px;margin-right:10px">
                <p style="font-weight: bold;font-size: 20px">3.ปัญหาอุปสรรค</p>
                <p><?=$kt[35] ?></p>
                <p style="font-weight: bold;font-size: 20px">4.แนวการแก้ไข</p>
                <p><?=$kt[36] ?></p>
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
</body>
</html>
