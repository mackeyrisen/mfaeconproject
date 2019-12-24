<table class="table table-bordered" style="font-family:fonts;font-size: 22px ;margin-left:1px">
                        <thead>
                            <th width="150px">-หัวข้อ-</th>
                            <th width="444px">-เนื้อหา-</th>
                        </thead>
                        <tr>
                            <td style="font-weight: bold;">ชื่อโครงการ</td>
                            <td><?=$kt_result[1]?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">งบประมาณที่ขอตั้ง</td>
                            <td><?=number_format($kt_result[4]) ?>บาท</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">แผนงานยุทธศาสตร์</td>
                            <td><?=$kt_result[8] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">กิจกรรม</td>
                            <td><?=$kt_result[6] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">ประเภทงบประมาณ</td>
                            <td><?=$kt_result[5] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">1.หลักการและเหตุผล</td>
                            <td><?=$kt_result[9] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">2.วัตถุประสงค์</td>
                            <td><?=$kt_result[10] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">3.เมือง/ประเทศที่จัด</td>
                            <td><?=$kt_result[11] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">4.กลุ่มเป้าหมาย</td>
                            <td><?=$kt_result[12] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">5.วิธีการดำเนินงาน/โครงการย่อย</td>
                            <td><?=$kt_result[13] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">6.ระยะเวลาดำเนินการ</td>
                            <td><?=$kt_result[14] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">7.ประมาณการค่าใช้จ่าย</td>
                            <td><?=$kt_result[15] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">8.ผลคาดว่าจะได้รับ</td>
                            <td><?=$kt_result[16] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">9.ผลการดำเนินการในปีที่ผ่านมา</td>
                            <td><?=$kt_result[17] ?></td>
                        </tr>

                    </table>