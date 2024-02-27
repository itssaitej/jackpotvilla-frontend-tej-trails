<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/menu') ?>
        <div class="card bg-transparent w-80">
            <div class="card-header text-center">Login</div>

            <?php
            if(isset($error_message) && $error_message)
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$error_message?></div>
                <?php
            }
            if(isset($message) && $message)
            {
                ?>
                <div class="alert alert-success mx-auto my-4" style="width: 75%" role="alert"><?=$message?></div>
                <?php
            }
            ?>
            <form class="register_box mx-auto mt-2 mb-4 w-75" method="post" action="/auth/login">

                <div class="form-group">
                    <label for="username">Username or Email*</label>
                    <input type="text" class="form-control" id="username-login" name="username" value="<?=isset($form_values['username']) ? $form_values['username'] : ''?>" required>
                </div>
                <?php
                if(!isset($status) || (isset($status) && $status != 'not_verified'))
                {
                    ?>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" id="password-login" name="password" required>
                    </div>
                    <?php
                }
                ?>
                <input type="submit" id="submit-button-login" class="btn btn-dark" name="login" value="Login">
                <?php
                if(isset($status) && $status == 'not_verified')
                {
                    ?>
                    <input type="hidden" name="status" value="<?=$status?>">
                    <input type="submit" class="btn btn-dark" name="resend_mail" value="Resend Mail" onclick="this.form.action='/auth/resend'">
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>
