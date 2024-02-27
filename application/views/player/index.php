<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="container-fluid my-4">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                        role="tab"><?=lang('profile_menu_account_detail')?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-transactions-tab" data-toggle="pill" href="#pills-transactions"
                        role="tab"><?=lang('profile_menu_view_transaction')?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-deposit-transactions-tab" data-toggle="pill" href="#pills-deposit-transations"
                        role="tab"><?=lang('profile_menu_view_deposit')?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-withdraws-tab" data-toggle="pill" href="#pills-withdraws"
                        role="tab"><?=lang('profile_menu_view_withdrawals')?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawal"
                        role="tab"><?=lang('profile_menu_withdraw')?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-preferences"
                        role="tab"><?=lang('profile_menu_preference')?></a>
                </li>

                <li class="nav-item mr-0 ml-auto deposit">
                <a href="<?php echo base_url() ?>deposit/option"><?=lang('header_deposit_button')?></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active p-2" id="pills-home" role="tabpanel"><?=lang('profile_menu_account_detail')?>
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-xs-12 mt-4">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <strong> User name: <?=$player_detail['username']?></strong>
                                    <a href="<?php echo base_url() ?>/player/change_password"><span class="float-right"><?=lang('profile_menu_change_password')?></span></a>
                                </div>
                            </div>
                            <table class="table table-bordered w-100 mt-4">
                                <tr>
                                    <td><?=lang('profile_menu_name')?></td>
                                    <td><?=$player_detail['firstname'] . ' ' . $player_detail['lastname']?></td>
                                </tr>
                                <tr>
                                    <td><?=lang('profile_menu_dob')?></td>
                                    <td><?=$player_detail['date_of_birth']?></td>
                                </tr>
                                <tr>
                                    <td><?=lang('profile_menu_address')?></td>
                                    <td><?=$player_detail['address_line_1'] . ' ' . $player_detail['address_line_2']?></td>
                                </tr>
                                <tr>
                                    <td><?=lang('profile_menu_city')?></td>
                                    <td><?=$player_detail['city']?></td>
                                </tr>
                                <tr>
                                    <td><?=lang('profile_menu_pincode')?></td>
                                    <td><?=$player_detail['pin_code']?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button class="btn btn-warning" onclick="goToUpdate()"><?=lang('profile_menu_edit_profile_button')?></button></td>
                                </tr>
                            </table>
                            <div class="card bg-transparent">
                                <div class="card-body"><strong> Email ID: <?=$player_detail['email']?></strong></div>
                            </div>
                            <div class="card bg-transparent mt-2">
                                <div class="card-body"><strong> Mobile Number: <?=$player_detail['mobile']?></strong></div>
                            </div>

                            <table class="table table-bordered w-100 mt-4">
                                <div class="card bg-transparent">
                                    <div class="card-body"><?=lang('profile_menu_address_proof')?></div>
                                </div>
                                <div class="card bg-transparent">
                                    <div class="card-body">PAN Card</div>
                                </div>
                                <tr>
                                    <td><button class="btn btn-warning"><?=lang('profile_menu_submit_button')?></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-xs-12 mt-4">
                            <div class="card bg-transparent p-2">
                                <?php
                                if($player_detail['gender'] == 'Female')
                                {
                                    ?>
                                    <img src="/assets/images/avatar-female.png" height="200" alt="">
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <img src="/assets/images/avatar-male.png" height="200" alt="">
                                    <?php
                                }
                                ?>
                                <div class="card-body">
                                    <button class="btn btn-warning btn-block"><?=lang('profile_menu_update_avatar_button')?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-2" id="pills-deposit" role="tabpanel">
                    <div class="containerk m-0 p-0">
                        <?php $this->load->view('deposit/option_form') ?>
                    </div>
                </div>
                <div class="tab-pane fade p-2" id="pills-transactions" role="tabpanel">
                    <table id="transaction_table" class="table table-striped text-center" style="width:100%">
                        <thead class="thead-dark">
                            <th>Ref. Id</th>
                            <th><?=lang('profile_menu_type')?></th>
                            <th><?=lang('profile_menu_amount')?></th>
                            <th><?=lang('profile_menu_current_balance')?></th>
                            <th>DateTime</th>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane fade p-2" id="pills-deposit-transations" role="tabpanel">
                    <?php
                    if($deposits)
                    {
                        ?>
                        <table id="deposit_table" class="table table-striped text-center">
                            <thead class="thead-dark">
                                <th>S.No</th>
                                <th>Ref. Id</th>
                                <th><?=lang('profile_menu_status')?></th>
                                <th><?=lang('profile_menu_amount')?></th>
                                <th><?=lang('profile_menu_type')?></th>
                                <th>DateTime</th>
                            </thead>
                        <?php
                        foreach($deposits as $index => $deposit)
                        {
                            ?>
                            <tr>
                                <td><?=$index + 1?></td>
                                <td><?=$deposit['transaction_id']?></td>
                                <td><?=$deposit['transaction_status']?></td>
                                <td><?=$deposit['credits_count']?></td>
                                <td><?=$deposit['payment_type']?></td>
                                <td><?=$deposit['created_at']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                    }
                    else
                    {
                        echo "No Deposit Done Yet.";
                    }
                    ?>
                </div>
                <div class="tab-pane fade p-2" id="pills-withdraws" role="tabpanel">
                    <?php
                    if($withdraws)
                    {
                        ?>
                        <table id="deposit_table" class="table table-striped text-center">
                            <thead class="thead-dark">
                                <th>S.No</th>
                                <th>Ref. Id</th>
                                <th><?=lang('profile_menu_requeted_amount')?></th>
                                <th><?=lang('profile_menu_amount_payable')?></th>
                                <th><?=lang('profile_menu_status')?></th>
                                <th>DateTime</th>
                                <th></th>
                            </thead>
                        <?php
                        foreach($withdraws as $index => $withdraw)
                        {
                            ?>
                            <tr>
                                <td><?=$index + 1?></td>
                                <td><?=$withdraw['withdrawal_id']?></td>
                                <td><?=$withdraw['request_amount']?></td>
                                <td><?=$withdraw['final_payable_amount']?></td>
                                <td><?=$withdraw['request_status']?></td>
                                <td><?=$withdraw['created_at']?></td>
                                <?php
                                if($withdraw['request_status'] == 'Pending')
                                {
                                    ?>
                                    <td><button onclick="cancel_withdraw('<?=$withdraw['withdrawal_id']?>')">CANCEL</button></td>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <td></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                    }
                    else
                    {
                        echo "No Request Found.";
                    }
                    ?>
                </div>
                <div class="tab-pane fade p-2" id="pills-preferences" role="tabpanel">
                    <div class="card py-3 px-1 mt-2 bg-transparent">
                        <div class="row px-3 mx-3">
                            <label> SMS </label>
                            <div class="custom-control custom-switch mr-2 ml-auto">
                                <input type="checkbox" class="custom-control-input" id="sms">
                                <label class="custom-control-label" for="sms"></label>
                            </div>
                        </div>
                    </div>
                    <div class="card py-3 px-1 mt-2 bg-transparent">
                        <div class="row px-3 mx-3">
                            <label> Phone </label>
                            <div class="custom-control custom-switch mr-2 ml-auto">
                                <input type="checkbox" class="custom-control-input" id="phone">
                                <label class="custom-control-label" for="phone"></label>
                            </div>
                        </div>
                    </div>
                    <div class="card py-3 px-1 mt-2 bg-transparent">
                        <div class="row px-3 mx-3">
                            <label> Mail </label>
                            <div class="custom-control custom-switch mr-2 ml-auto">
                                <input type="checkbox" class="custom-control-input" id="mail">
                                <label class="custom-control-label" for="mail"></label>
                            </div>
                        </div>
                    </div>
                    <div class="card py-3 px-1 mt-2 bg-transparent">
                        <div class="row px-3 mx-3">
                            <label> <?=lang('profile_menu_i_want_to_receive_promotional_sms')?>. </label>
                            <div class="custom-control custom-switch mr-2 ml-auto">
                                <input type="checkbox" class="custom-control-input" id="msg_sms">
                                <label class="custom-control-label" for="msg_sms"></label>
                            </div>
                        </div>
                    </div>
                    <div class="card py-3 px-1 mt-2 bg-transparent">
                        <div class="row px-3 mx-3">
                            <label> <?=lang('profile_menu_i_want_to_receive_promotional_mails')?>. </label>
                            <div class="custom-control custom-switch mr-2 ml-auto">
                                <input type="checkbox" class="custom-control-input" id="msg_mail">
                                <label class="custom-control-label" for="msg_mail"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-2" id="pills-withdrawal" role="tabpanel">
                    <div class="card bg-transparent m-2 p-2">
                        <?php $this->load->view('withdraw/common_form');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function goToUpdate()
    {
        window.location.href="/player/profile";
    }
</script>
