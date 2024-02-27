<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>

        <div class="card w-50 mobile_view mx-auto mt-4 p-4">
            <div class="card-header modal-header text-white text-center my-4">Change Password</div>
            <?php
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$error_message?></div>
                <?php
            }
            ?>
            <form class="register_box mx-auto mt-2 mb-4 w-75" method="post" action="/player/change_password">
                <div class="form-group">
                    <label for="Password">Enter Current Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="Password">Enter New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="form-group">
                    <label for="Password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <input type="submit" class="btn btn-dark" name="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
