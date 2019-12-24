<div class="card">
                        <div class="card-header">
                            <strong class="card-title">โครงการส่งเสริมสินค้าและธุรกิจฮาลาลในต่างประเทศ</strong>
                            <form method="post" action="export_halal.php">
                            	<input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export2" class="table table-striped table-bordered">
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
                                    <? 
                                    $i = 1;
                                    while ($result3 = $query3->fetch_array()) { ?>
                                        <tr>
                                        <td>
                                        <?php 
                                        $org = str_replace("_".$year,"",$result3[0]);
                                        $sql4 ="SELECT * FROM member WHERE user = '".$org."'";
                                        $query4 = $conn->query($sql4);
                                        $result4 = $query4->fetch_array();
                                        echo $result4[3];
                                        ?>
                                        </td>
                                           <td> <?=number_format($result3['budget']) ?> </td>
                                        <td>
                                        <?
                                        if($result3[18]==1)
                                            {
                                                echo "ร่างคำขอ";
                                            }
                                            elseif ($result3[18]==2) 
                                            {
                                               echo "ยื่นคำขอ";  
                                            }
                                            elseif ($result3[18]==3) 
                                            {
                                               echo "รับเรื่อง";  
                                            }
                                            elseif ($result3[18]==4) 
                                            {
                                               echo "พิจารณา";  
                                            }elseif ($result3[18]==5) 
                                            {
                                               echo "ไม่อนุมัติ";  
                                            }
                                            elseif ($result3[18]==6) 
                                            {
                                               echo "อนุมัติ";  
                                            }
                                            elseif ($result3[18]==7) 
                                            {
                                               echo "แก้ไขคำขอ";  
                                            }
                                            elseif ($result3[18]==8) 
                                            {
                                               echo "<p style='color:red'>โอนงบเรียบร้อย</p>";  
                                            }
                                            elseif ($result3[18]==9) 
                                            {
                                               echo "<p style='color:red'>โอนงบบางส่วน</p>";  
                                            }               
                                        ?>
                                        </td>
                                         <td>
                                        	<?php 
                                        			$sqlhl = "SELECT * FROM `halal_backup` WHERE request_id ='".$result3[0]."'";
                                        			$queryhl = $conn->query($sqlhl);
                                        			$resulthl= $queryhl->fetch_array();
                                        			if($resulthl[0] == $result3[0]){
                                        				
                                        				echo "<a href='halal_view2.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        			else{
                                        				echo "<a href='halal_view.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
                                        </td>
                                        <td>
                                        	<?php 
                                        			$sqlhl = "SELECT * FROM `halal_backup` WHERE request_id ='".$result3[0]."'";
                                        			$queryhl = $conn->query($sqlhl);
                                        			$resulthl= $queryhl->fetch_array();
                                        			if($resulthl[0] == $result3[0]){
                                        				
                                        				echo "<a href='halal_view.php?id=".$result3[0]."&user=".$result4[1]."' target='_blank'><i class='fa fa-file'></i></a>";
                                        			}
                                        	?>
                                        </td>
                                        <td> <?=$result3['date']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#edit_hl<?=$i ?>"><i class="fa fa-pencil"></i></button>
                                            <?php include 'edit_status_hl.php'; ?>
                                        </td>
                                        </tr>
                                        <?  $i++ ;}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>