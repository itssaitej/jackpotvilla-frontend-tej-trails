<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>

        <div class="card w-75 m-0 p-0 my-5 mx-auto text-center">
            <div class="card bg-transparent m-0 p-0">
                <div class="alert alert-success m-0 p-4" role="alert">
                    <h4 class="alert-heading">Deposit Pending</h4>
                    <p><?=$message?><br/><br/><?=isset($coupon_message) ? $coupon_message : ''?></p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>