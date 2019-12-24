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
                                    <th>No.</th>
                                    <th>สอท./สกญ.</th>
                                    <th>ครัวไทย</th>
                                    <th>ฮาลาล</th>
                                </thead>
                                <tbody>
                                    <?  $i = 1;
                                    while($compare = $query_compare->fetch_array()) { ?>
                                    <tr>
                                        <td>
                                        <?=$i ; ?>
                                        </td>
                                        <td>
                                        <?=$compare[2] ; ?>
                                        </td>
                                        <td>
                                            <a href="admin_compare_view2.php?id=<?=$compare[1]?>&type=1" target="_blank"><button class="btn btn-info"><i class="fa fa-eye"> เปรียบเทียบ</i></button></a>
                                        </td>
                                        <td>
                                            <a href="admin_compare_view2.php?id=<?=$compare[1]?>&type=2" target="_blank"><button class="btn btn-success"><i class="fa fa-eye"> เปรียบเทียบ</i></button> </a>
                                        </td>
                                    </tr>
                                   <? $i++ ; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>