<!--Add Link-->
            <div class="modal fade" id="delnews<?=$i ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">ลบลิงก์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="news_delete.php" method="POST">
                            <div class="modal-body">
                             แน่ใจที่จะลบ ?
                                
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?=$linkshow[0]; ?>">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!--#Add Link-->