<!--Add Link-->
            <div class="modal fade" id="edit_hl<?=$no ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">แก้ไขสถานะ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="hlreport_status_update.php" method="POST">
                            <div class="modal-body">
                                <div class="row form-group">
                                &nbsp;
                                <input type="radio" name="status" value="1" <? if($result3['place5']==1){echo "checked" ;} ?> >ร่างรายงานผล&nbsp;</option>
                                <input type="radio" name="status" value="2" <? if($result3['place5']==2){echo "checked" ;} ?> >ยื่นรายงานผล&nbsp;</option>
                                <input type="hidden" name="year" value="<?=$_GET['year']; ?>">   
                                <input type="hidden" name="id" value="<?=$result3[0]; ?>">   
                                </div>                                                          
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!--#Add Link-->