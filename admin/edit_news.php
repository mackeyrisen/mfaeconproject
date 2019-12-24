<!--Add Link-->
            <div class="modal fade" id="editnews<?=$i ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">แก้ไขลิงก์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="news_update.php" method="POST">
                            <div class="modal-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">ชื่อเรื่อง</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="ชื่อเรื่อง" class="form-control" value="<?=$linkshow[1]; ?>"><small class="form-text text-muted">ชื่อหัวข้อ</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">URL</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="url" placeholder="ลิงก์" class="form-control" value="<?=$linkshow[2]; ?>"><small class="form-text text-muted">example: https://mfaeconproject.com/news/</small></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">หมวดหมู่</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control-sm form-control">
                                            <option value="0" <?php if($linkshow[5]=="0"){echo "selected";} ?> >-ไม่มีหมวดหมู่-</option>
                                            <option value="1" <?php if($linkshow[5]=="1"){echo "selected";} ?> >ข้อมูลเชฟ</option>
                                            <option value="2" <?php if($linkshow[5]=="2"){echo "selected";} ?> >ฮาลาล</option>
                                            <option value="3" <?php if($linkshow[5]=="3"){echo "selected";} ?> >นวัตกรรมอาหาร</option>
                                            <option value="4" <?php if($linkshow[5]=="4"){echo "selected";} ?> >อีเว้นท์</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">การแสดงผล</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control-sm form-control">
                                            <option value="0" <?php if($linkshow['status']=="0"){echo "selected";} ?> >ปิด</option>
                                            <option value="1" <?php if($linkshow['status']=="1"){echo "selected";} ?> >แสดง</option>
                                        </select>
                                    </div>
                                </div>                             
                                
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?=$linkshow[0]; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!--#Add Link-->