<div class="wrapper">
<?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
    <?php $this->load->view('common/casino_menu_other') ?>
    <div class="card w-50 mobile_view mx-auto my-4 p-4">
        <div class="card-header bg-dark text-white text-center my-2">Got a question? Send us your enquiry in the contact form
or for a quick response use Live Chat</div>
            <?php
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$error_message?></div>
                <?php
            }
            if(isset($message))
            {
                ?>
                <div class="alert alert-success mx-auto my-4" style="width: 75%" role="alert"><?=$message?></div>
                <?php
            }
            ?>
            <form action="/support" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" <?=isset($form_values) ? $form_values['name'] : ''?>>
                </div>
                <div class="form-group">
                    <label for="alias">Alias*</label>
                    <input type="text" class="form-control" id="alias" name="alias" required <?=isset($form_values) ? $form_values['alias'] : ''?>>
                </div>
                <div class="form-group">
                    <label for="mail_id">Email*</label>
                    <input type="email" class="form-control" id="mail_id" name="email" required <?=isset($form_values) ? $form_values['email'] : ''?>>
                </div>
                <div class="form-group">
                    <label for="message">Enter Message</label>
                    <textarea class="form-control" rows="5" id="message" name="message" <?=isset($form_values) ? $form_values['message'] : ''?>></textarea>
                </div>
                <input type="submit" class="btn btn-warning" value="<?=lang('profile_menu_submit_button')?>">
            </form>
        </div>
</div>
</div>
