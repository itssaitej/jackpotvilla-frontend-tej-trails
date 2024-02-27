<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="card w-100 mobile_view mx-auto h-75 py-4">
            <?php
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto text-center" style="width: 75%;" role="alert"><?=$error_message?></div>
                <?php
            }
            ?>
            <form action="/coupon/redeem" class="mx-auto" method="post">
                <div class="form-group row p-4">
                    <label for="redeem">Redeem Coupon*</label>
                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="" required>
                    <input type="submit" class="btn btn-dark my-4" name="coupon" value="Redeem coupon">
                </div>
            </form>
        </div>
    </div>
</div>


<!--div class="modal fade" id="redeemModal" tabindex="-1" role="dialog" aria-labelledby="redeemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="redeemModalLabel">Redeem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div-->
