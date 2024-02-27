<div class="wrapper">
<?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
    <?php $this->load->view('common/casino_menu_other') ?>

    <div class="card h-auto w-75 d-block m-auto m-3 text-justify mobile_view">
        <div class="card-header text-white mb-3 p-1 text-center" style="background-color: #ee0000; margin-top: 1em">
            <h3><?=lang('cookies_policy_title')?></h3>
        </div>
        <div class="container text-justify">
        <div class="card-body" style="font-size: 14px;">
            <?=lang('cookies_policy_content')?>
        </div>
        </div>
    </div>
</div>
</div>
