<!--Add Link-->
            <div class="modal fade" id="editnews<?=$i ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">แก้ไขสถานะ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="status_update.php" method="POST">
                            <div class="modal-body">
                                <div class="row form-group">
                                &nbsp;
                                <input type="radio" name="status" value="1" <? if($result[18]==1){echo "checked" ;} ?> >ร่างคำขอ&nbsp;</option>
                                <input type="radio" name="status" value="2" <? if($result[18]==2){echo "checked" ;} ?> >ยื่นคำขอ&nbsp;</option>
                                <input type="radio" name="status" value="3" <? if($result[18]==3){echo "checked" ;} ?> >รับเรื่อง&nbsp;</option>
                                <input type="radio" name="status" value="4" <? if($result[18]==4){echo "checked" ;} ?> >พิจารณา&nbsp;</option>
                                <input type="radio" name="status" value="5" <? if($result[18]==5){echo "checked" ;} ?> >ไม่อนุมัติ&nbsp;</option>
                                <input type="radio" name="status" value="6" <? if($result[18]==6){echo "checked" ;} ?> >อนุมัติ&nbsp;</option>
                                <input type="radio" name="status" value="7"<? if($result[18]==7){echo "checked" ;} ?> >แก้ไขคำขอ&nbsp;</option>
                                <input type="radio" name="status" value="8" <? if($result[18]==8){echo "checked" ;} ?> >โอนงบประมาณ&nbsp;</option>
                                <input type="radio" name="status" value="9" <? if($result[18]==9){echo "checked" ;} ?> >โอนงบบางส่วน </option>
                                <input type="hidden" name="id" value="<?=$result[0]; ?>">   
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