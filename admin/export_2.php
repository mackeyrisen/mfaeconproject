<?php  
//export.php  
include ('dbconfig.php');
$output = '';

 //$sql = "SELECT * FROM request WHERE status BETWEEN'2' AND '10'";
  $sql ="SELECT * FROM request
INNER JOIN member ON request.organize = member.name 
INNER JOIN country ON member.country_no = country.country_no
WHERE status BETWEEN 2 AND 10 ORDER BY country.country_no,member.id";
 $query = $conn->query($sql);


  $output .= '
   <table class="table" border="1" style="font-family:TH Sarabun New; font-size: 18px">
   <tr> <td align="center">คำขอตั้งงบประมาณรายจ่ายประจำปีงบประมาณ พ.ศ. 2562 
งบรายจ่ายอื่น
โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</td></tr>  
                    <tr>  
                         <th>ภูมิภาค</th>  
                         <th>สอท./สกญ.</th>  
                         <th>ชื่อโครงการ</th>  
       <th>งบประมาณที่ขอตั้ง(บาท)</th>
       <th>วัตถุประสงค์</th>
       <th>วีถีดำเนินการ</th>
       <th>ระยะดำเนินการ</th>
       <th>ผลดำเนินการปีที่ผ่านมา</th>
                    </tr>
  ';
  while($row = $query->fetch_array())
  {
   $output .= '
    <tr>  
       <td>'.$row["country_name"].'</td>  
       <td>'.$row["name"].'</td>  
        <td>'.$row['project'].'</td>  
       <td>'.number_format($row["budget"]).'</td>
       <td>'.$row["B"].'</td>  
       <td>'.$row["E"].'</td>
       <td>'.$row["F"].'</td>
       <td>'.$row["H"].'</td>
     </tr>
   ';
  }
  $output .= '</table>';
 
  echo $output;
 

?>