                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">โครงการส่งเสริมนโยบายครัวไทยสู่ครัวโลกในต่างประเทศ</strong>
                            <form method="post" action="export.php">
                                <input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                 <thead>
                                    <th>สอท./สกญ.</th>
                                    <th>งบประมาณ</th>
                                    <th>สถานะ</th>  
                                    <th>โครงการที่อนุมัติ</th>
                                    <th>เปลี่ยนแปลงโครงการ</th>
                                    <th>อัพเดทล่าสุด</th>
                                    <th>แก้ไขสถานะ</th> 
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    while ($result = $query->fetch_array()) { ?>
                                        <tr>
                                        <td>
                                        <?php 
                                        $org = str_replace("_".$year,"",$result[0]);
                                        $sql2 ="SELECT * FROM member WHERE user = '".$org."'";
                                        $query2 = $conn->query($sql2);
                                        $result2 = $query2->fetch_array();
                                        echo $result2['city'];
                                        //echo $sql2;
                                        ?>
                                        <td><?=number_format($result['budget'])?></td>
                                        </td>
                                        <td>
                                        <?php if($result[18]==1)
                                            {
                                                echo "ร่างคำขอ";
                                            }
                                            elseif ($result[18]==2) 
                                            {
                                               echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'></i><font style='color:orange'><i class='fa fa-file'></i> ยื่นคำขอ</font></a>";  
                                            }
                                            elseif ($result[18]==3) 
                                            {
                                               echo "รับเรื่อง";  
                                            }
                                            elseif ($result[18]==4) 
                                            {
                                               echo "พิจารณา";  
                                            }elseif ($result[18]==5) 
                                            {
                                               echo "ไม่อนุมัติ";  
                                            }
                                            elseif ($result[18]==6) 
                                            {
                                               echo "อนุมัติ";  
                                            }
                                            elseif ($result[18]==7) 
                                            {
                                               echo "แก้ไขคำขอ";  
                                            }
                                            elseif ($result[18]==8) 
                                            {
                                               echo "<p style='color:red'>โอนงบเรียบร้อย</p>";  
                                            }
                                            elseif ($result[18]==9) 
                                            {
                                               echo "<p style='color:red'>โอนงบบางส่วน</p>";  
                                            }               

                                        ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($result['status']>=3)
                                                {    
                                                    $sqlkt = "SELECT * FROM `kruathai_backup` WHERE request_id ='".$result[0]."'";
                                                    $querykt = $conn->query($sqlkt);
                                                    $resultkt= $querykt->fetch_array();
                                                    if($resultkt[0] == $result[0]){
                                                        
                                                        echo "<a href='kruathai_view2.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                                    }
                                                    else{
                                                        echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                    $sqlkt = "SELECT * FROM `kruathai_backup` WHERE request_id ='".$result[0]."'";
                                                    $querykt = $conn->query($sqlkt);
                                                    $resultkt= $querykt->fetch_array();
                                                    if($resultkt[0] == $result[0]){
                                                        
                                                        echo "<a href='kruathai_view.php?id=".$result[0]."&user=".$result2[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                                    }
                                            ?>
                                        </td>
                                        <td><?php echo $result['date']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#editnews<?=$i ?>"><i class="fa fa-pencil"></i></button>
                                            <?php include 'edit_status.php'; ?>
                                        </td>
                                        </tr>
                                        <?  $i++ ;}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>