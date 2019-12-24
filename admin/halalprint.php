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
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MFA Thailand</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
        @font-face {
          font-family: THSarabunIT๙;
          src: url(fonts/THSarabunIT๙.ttf);
        }
        p{
           
            color:black;
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
    
    document.body.removeChild(downloadLink);
}
    </script>
</head>
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
                        <a href="#report"> <i class="menu-icon fa fa-bar-chart-o"></i>รายงานผล</a>
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
                        <h1 style="font-family: TH SarabunPSK;font-size: 24px;font-weight: bold;">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. 2562</h1>
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
            <div align="center" style="margin-top: 20px;font-family:THSarabunIT๙;font-weight: bold;font-size: 24px;margin-left:50px;margin-right: 50px; ">
                คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. 2562 <br>
                งบรายจ่ายอื่น<br>
                <?=$result[2] ?><br>
                
            </div>
            <br>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:1px">
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
                        <td><?=number_format($result[4]) ?> บาท</td>
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
                    
                
                    
                </table>
            </div>
            <br>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">1.หลักการและเหตุผล</div>
                <div>
                <?=$result[9] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">2.วัตถุประสงค์</div>
                <div>
                <?=$result[10] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">3.เมือง/ประเทศที่จัด</div>
                <div>
                <?=$result[11] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">4.กลุ่มเป้าหมาย</div>
                <div>
                <?=$result[12] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">5.วิธีการดำเนินการ/โครงการย่อย</div>
                <div>
                <?=$result[13] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">6.ระยะเวลาดำเนินการ</div>
                <div>
                <?=$result[14] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">7.ประมาณการค่าใช้จ่าย</div>
                <div>
                <?=$result[15] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">8.ผลคาดว่าที่จะได้รับ</div>
                <div>
                <?=$result[16] ?>
                </div>
            </div>
            <div style="font-family:THSarabunIT๙;font-size: 24px ;margin-left:10px;margin-right:10px">
                <div style="font-weight: bold;">9.ผลการดำเนินการในปีที่ผ่านมา(หากมี)</div>
                <div>
                <?=$result[17] ?>
                </div>
            </div>

            </div>
        </div>
        <div class="col-sm-3" style="margin-top: 100px">
            <button class="btn btn-outline-primary btn-lg" type="button" onclick="printDiv('printableArea')"><span class="fa fa-print"></span> print</button> 
            <button class="btn btn-outline-primary btn-lg" type="button" onclick="Export2Doc('exportContent', 'halal_word');"><span class="fa fa-save"></span> Word</button>
        </div>
            </div>
           
        </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    <script type="text/javascript">

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
