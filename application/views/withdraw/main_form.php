<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/menu') ?>
        <div class="card bg-transparent w-80">
            <div class="card-header d-block text-white my-4 bg-dark w-50 mx-auto text-center">Withdraw Form</div>
            <?php
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto text-center" style="width: 75%;" role="alert"><?=$error_message?></div>
                <?php
            }
            ?>
            <div class="register_box mx-auto mt-2 mb-4 w-75">
                <?php $this->load->view('withdraw/common_form');?>
            </div>
        </div>
    </div>
</div>
