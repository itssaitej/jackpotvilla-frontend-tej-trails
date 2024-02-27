<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/menu') ?>
        <div class="card bg-transparent w-80">
            <div class="card-header text-center">Registration</div>

            <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$error_message?></div>
            <form class="register_box mx-auto mt-2 mb-4 w-75" method="post" action="/auth/register">
                <div class="form-group">
                    <label for="username">Username*</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?=$form_values['username']?>" required>
                </div>

                <div class="form-group">
                    <label for="Email">Email*</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$form_values['email']?>" required>
                </div>

                <div class="form-group">
                    <label for="Phone">Phone Number*</label>
                    <input type="number" class="form-control" id="phone_number" name="mobile" value="<?=$form_values['mobile']?>" required>
                </div>

                <div class="form-group">
                    <label for="Country">Country*</label>
                    <select class="custom-select" id="countries_list" name="country_id" required>
                        <option value="">-- Choose --</option>
                        <?php
                        $countries = get_all_countries();
                        foreach($countries as $country)
                        {
                            ?>
                            <option value="<?=$country['id']?>" <?=($form_values['country_id'] == $country['id']) ? 'selected' : ''?>><?=$country['name']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <input type="checkbox" class="mt-2" name="tnc" id="tnc" <?=(isset($form_values['tnc']) && $form_values['tnc'] == 'on') ? 'checked' : ''?>>
                    <label for="18"><small>I am 18+ &amp; Accept <a href="/terms_and_conditions" style="color: red">T&C</a></small></label>
                </div>
                <input type="submit" class="btn btn-dark" name="register" value="Register">
            </form>
        </div>
    </div>
</div>
