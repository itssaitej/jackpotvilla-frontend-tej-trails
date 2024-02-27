<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="container my-4">
            <?php
            if($message)
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$message?></div>
                <?php
            }
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%" role="alert"><?=$error_message?></div>
                <?php
            }
            ?>
            <form name="player_update_form" method="post" autocomplete="new-form" action="/player/update">
                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label for="username">First Name*</label>
                            <input type="text" autocomplete="first" class="form-control" id="firstname" name="firstname" value="<?=$player_detail['firstname']?>" required>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label for="username">Last Name*</label>
                            <input type="text" autocomplete="last" class="form-control" id="lastname" name="lastname" value="<?=$player_detail['lastname']?>" required>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label for="Email">Email*</label>
                            <input type="email" autocomplete="new-email" class="form-control" id="email" name="email" value="<?=$player_detail['email']?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="Date of Birth">Date of Birth*</label>
                            <input type="text" class="form-control" id="dob" name="date_of_birth" value="<?=$player_detail['date_of_birth']?>" required>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="Phone">Phone Number*</label>
                            <input type="number" autocomplete="false" class="form-control" id="phone_number" name="mobile" value="<?=$player_detail['mobile']?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12 mt-4 pt-3">
                        <div class="form-group">
                            <label for="gender">Gender*</label>
                            <input type="radio" value="Male" name="gender" id="male" <?=(!$player_detail['gender'] || $player_detail['gender'] == 'Male') ? 'checked' : ''?>>
                            <label for="Male">Male</label>
                            <input type="radio" value="Female" name="gender" id="female" <?=$player_detail['gender'] == 'Female' ? 'checked' : ''?>>
                            <label for="Female">Female</label>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="Country">Country*</label>
                            <select class="custom-select" id="country" required name="country_id" disabled>
                                <option value="">-- Choose --</option>
                                <?php
                                $countries = get_all_countries();
                                foreach($countries as $country)
                                {
                                    ?>
                                    <option value="<?=$country['id']?>" <?=($player_detail['country_id'] == $country['id']) ? 'selected' : ''?>><?=$country['name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="State">State*</label>
                            <select class="custom-select" id="state" required name="state">
                                <option value="">-- Choose --</option>
                                <?php
                                $states = get_all_states($player_detail['country_id']);
                                foreach($states as $state)
                                {
                                    ?>
                                    <option value="<?=$state['name']?>" <?=($player_detail['state'] == $state['name']) ? 'selected' : ''?>><?=$state['name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="City">City*</label>
                            <input type="text" autocomplete="new-city" class="form-control" id="city" name="city" value="<?=$player_detail['city']?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="Address">Address*</label>
                            <input type="textarea" autocomplete="new_address" class="form-control" id="address" name="address_line_1" value="<?=$player_detail['address_line_1']?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="pincode">Zipcode*</label>
                            <input type="text" autocomplete="new_pin" class="form-control" id="pincode" name="pin_code" value="<?=$player_detail['pin_code']?>" required>
                        </div>
                    </div>
                    <?php
                    if($signup_bonus)
                    {
                        ?>
                        <input type="hidden" name="wallet_account_id" value="<?=$player_detail['wallet_account_id']?>">
                        <?php
                    }
                    ?>
                    <input type="submit" class="btn btn-success" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
