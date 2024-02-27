<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="card bg-transparent m-4 m-auto p-4">
            <div class="container m-0 mx-auto  my-4 p-0">
                <?php $this->load->view('deposit/option_form')  ?>
            </div>
        </div>
    </div>
</div>
