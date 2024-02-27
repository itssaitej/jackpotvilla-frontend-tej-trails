<form action="/deposit/card-process" method="post" name="deposit-form">
    <div class="row m-1 p-0">
        <div class="col-lg-3 col-md-3 col-xs-12 deposit_types">
<?php
//if($noof_deposits)
//{
?>
            <label class="card py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="visa" onclick="show_card_form('VISA')">
                    </div>
                    <div class="col-8 m-auto">
                        <img src="/assets/images/Footer/visa.png" height="25" alt="">
                    </div>
                </div>
            </label>
            <label class="card py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="master" onclick="show_card_form('MASTER')">
                    </div>
                    <div class="col-8 m-auto">
                        <img src="/assets/images/Footer/Mastercard.png" class="mx-auto" height="35" alt="">
                    </div>
                </div>
            </label>
<?php
//}
?>
            <?php
            if($noof_deposits && ($country_id == 211))
            {
                ?>
                <label class="card py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="trustly" onclick="show_card_form('TRUSTLY')">
                        </div>
                        <div class="col-8 m-auto">
                            <img src="/assets/images/Footer/trustly.png" class="mx-auto" height="35" alt="">
                        </div>
                    </div>
                </label>
                <?php
            }
            /*
            if($country_id == 12)
            {
                ?>
                <label class="card py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="poly" onclick="show_card_form('POLY')">
                        </div>
                        <div class="col-8 m-auto">
                            <img src="/assets/images/Footer/poli.png" class="mx-auto" height="35" alt="">
                        </div>
                    </div>
                </label>
                <?php
            }
            /*
            <label class="card py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="amex" onclick="show_card_form('AMEX')">
                    </div>
                    <div class="col-8 m-auto">
                        <img src="/assets/images/amex.jpg" height="35" alt="">
                    </div>
                </div>
            </label>
            <label class="card py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="nexxa" onclick="show_card_form('NEXXA')">
                    </div>
                    <div class="col-8 m-auto">
                        <div class="row w-100">
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="/assets/images/Footer/Mastercard.png" height="25" alt="">
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <img src="/assets/images/Footer/visa.png" class="mt-1" height="20" alt="">
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <img src="/assets/images/bitcoin.png" height="30" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </label>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="neosurf" onclick="show_card_form('NEOSURF')">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/neosurf.png" class="mx-auto" height="25" alt="">
                    </div>
                </div>
            </label>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="flexepin" onclick="show_card_form('FLEXEPIN')">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/flexipin.png" class="mx-auto" height="20" alt="">
                    </div>
                </div>
            </label>
            <?php
            if($current_currency == 'CAD')
            {
                ?>
                <!--label class="card bg-transparent py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="eft" onclick="show_card_form('EFT')">
                        </div>
                        <div class="col-8 m-auto mx-auto">
                            <img src="/assets/images/eft.png" class="mx-auto" height="20" alt="">
                        </div>
                    </div>
                </label-->
                <label class="card bg-transparent py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="emt" onclick="show_card_form('EMT')">
                        </div>
                        <div class="col-8 m-auto mx-auto">
                            <img src="/assets/images/emt.png" class="mx-auto" height="20" alt="">
                        </div>
                    </div>
                </label>
                <?php
            }
            */
            if($country_id == 153)
            {
                ?>
                <label class="card bg-transparent py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="ideal" onclick="show_card_form('IDEAL')">
                        </div>
                        <div class="col-8 m-auto mx-auto">
                            <img src="/assets/images/iDeal.png" class="mx-auto" height="20" alt="">
                        </div>
                    </div>
                </label>
                <?php
            }
            if($country_id == 79 || $country_id == 13 || $country_id == 20 || $country_id == 212 || $country_id == 201 || $country_id == 72 || $country_id == 106 || $country_id == 153 || $country_id == 174)
            {
                ?>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="bnp_pay_by_bank" onclick="show_card_form('BNP_PAY_BY_BANK')">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/bnp_pay_by_bank.png" class="mx-auto" height="20" alt="">
                    </div>
                </div>
            </label>
            <?php
/*
                ?>
                <label class="card bg-transparent py-3">
                    <div class="row">
                        <div class="col-4 m-auto">
                            <input type="radio" class="mx-4" name="mode_of_payments" value="sofort" onclick="show_card_form('SOFORT')">
                        </div>
                        <div class="col-8 m-auto mx-auto">
                            <img src="/assets/images/sofort.png" class="mx-auto" height="20" alt="">
                        </div>
                    </div>
                </label>
                <?php
*/
            }
            ?>
            <!--label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" value="direct_banking" onclick="show_card_form('DIRECT_BANKING')">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/directBanking.png" class="mx-auto" height="36" alt="">
                    </div>
                </div>
            </label-->
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" onclick="submit_form('crypto', 'btc')" value="btc">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/Footer/bitcoin.png" class="mx-auto" height="20" alt="">
                    </div>
                </div>
            </label>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" onclick="submit_form('crypto', 'eth')" value="eth">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/eth.png" class="mx-auto" height="40" alt="">
                    </div>
                </div>
            </label>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" onclick="submit_form('crypto', 'phoenix')" value="phoenix">
                    </div>
                    <div class="col-8 m-auto mx-auto d-flex" style="flex-direction:row; align-items:center; ">
                        <img src="/assets/images/phoenixLogo.svg" height="40" alt="">
                        <p style="font-weight: 700; padding-top: 8px; font-size: 1rem">Phoenix</p>
                    </div>
                </div>
            </label>
            <!--label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" onclick="submit_form('crypto', 'satx')" value="satx">
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/satx.png" class="mx-auto" height="40" alt="">
                    </div>
                </div>
            </label>
            <label class="card bg-transparent py-3">
                <div class="row">
                    <div class="col-4 m-auto">
                        <input type="radio" class="mx-4" name="mode_of_payments" onclick="submit_form('crypto', 'grt')" value="grt" >
                    </div>
                    <div class="col-8 m-auto mx-auto">
                        <img src="/assets/images/grt.png" class="mx-auto" height="40" alt="">
                    </div>
                </div>
            </label-->
        </div>
        <div class="col-lg-6 col-md-3 col-xs-12">
            <div class="card bg-transparent my-2" style="box-shadow:none; border: 2px solid #00cc00; border-radius: 4px;" id="amount-section">
                <div class="card-header bg-success text-white mb-4"><h5 id="quick-deposit-text"><?=lang('deposit_quick_deposit')?></h5></div>
                <div class="row px-2">
                    <div class="col-6 my-1">
                        <label class="w-100 py-2" style="border: 1px solid #00ff00">
                            <input type="radio" class="mx-4" name="deposit_amount" value="25" >
                            <span><label for="deposit_25" style="font-size:16px; color: green"><?=$currency_symbol?> 25</label></span>
                        </label>
                    </div>
                    <div class="col-6 my-1">
                        <label class="w-100 py-2" style="border: 1px solid #00ff00">
                            <input type="radio" class="mx-4" name="deposit_amount" value="50" >
                            <span><label for="deposit_50" style="font-size:16px; color: green"><?=$currency_symbol?> 50</label></span>
                        </label>
                    </div>
                    <div class="col-6 my-1">
                        <label class="w-100 py-2" style="border: 1px solid #00ff00">
                            <input type="radio" class="mx-4" name="deposit_amount" value="100" >
                            <span><label for="deposit_100" style="font-size:16px; color: green"><?=$currency_symbol?> 100</label></span>
                        </label>
                    </div>
                    <div class="col-6 my-1">
                        <label class="w-100 py-2" style="border: 1px solid #00ff00">
                            <input type="radio" class="mx-4" name="deposit_amount" value="200" >
                            <span><label for="deposit_200" style="font-size:16px; color: green"><?=$currency_symbol?> 200</label></span>
                    </label>
                    </div>
                    <div class="col-6 my-1">
                        <label class="w-100 py-2" style="border: 1px solid #00ff00">
                            <input type="radio" class="mx-4" name="deposit_amount" value="500" >
                            <span><label for="deposit_500" style="font-size:16px; color: green"><?=$currency_symbol?> 500</label></span>
                        </label>
                    </div>
                    <div class="col-6 my-1">
                        <div class="w-100 py-2">
                            <div class="form-input mx-1 mb-0">
                                <input type="number" class="form-control mb-0 pb-0" id="other_amount" name="other_amount" placeholder="Enter Other Amount" style="border-bottom: 1px solid #00ff00; width: 100%;" onkeypress="allowNumbersOnly(event)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visa / Master / Amex / Flexepin Card Details Form Starts -->
            <div class="card m-0 p-1 mt-4" id="normal-card-detail-form" style="display: none;">
                <div class="card-header d-block text-white bg-dark w-100 mx-auto">Enter Card Details</div>
                <div class="form-group row mx-2 my-3">
                    <label for="cardnumber" class="col-sm-4 col-form-label">16 Digit Card Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="card_number" name="card_number" maxlength="19" onkeypress="allowNumbersOnly(event)" onkeyup="addHyphen(this)">
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="card_expiry_year" class="col-sm-4 col-form-label">Card Expiry Year</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="card_expiry_year" name="card_expiry_year" onchange="generateMonths(this.value)"></select>
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="card_expiry_month" class="col-sm-4 col-form-label">Card Expiry Month</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="card_expiry_month" name="card_expiry_month"></select>
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="card_cvv" class="col-sm-4 col-form-label">Card CVV</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="card_cvv" name="card_cvv" maxlength="3" onkeypress="allowNumbersOnly(event)">
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="card_holder_name" class="col-sm-4 col-form-label">Card Holder Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="card_holder_name" name="card_holder_name">
                    </div>
                </div>
            </div>
            <!-- Visa / Master / Amex / Flexepin Card Details Form Ends -->

            <!-- EFT Card Detail Starts -->
            <div class="card m-0 p-1 mt-4" id="eft-card-detail-form" style="display: none;">
                <div class="card-header d-block text-white bg-dark w-100 mx-auto">Enter Card Details</div>
                <div class="form-group row mx-2 my-3">
                    <label for="institution_number" class="col-sm-4 col-form-label">Institution Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="institution_number" name="institution_number">
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="routing_no" class="col-sm-4 col-form-label">Routing Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="routing_no" name="routing_no">
                    </div>
                </div>
                <div class="form-group row mx-2 my-3">
                    <label for="account_no" class="col-sm-4 col-form-label">Account Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="account_no" name="account_no">
                    </div>
                </div>
            </div>
            <!-- EFT Card Detail Ends -->

            <!-- FLEXEPIN Card Detail Starts -->
            <div class="card m-0 p-1 mt-4" id="flexepin-card-detail-form" style="display: none;">
                <div class="card-header d-block text-white bg-dark w-100 mx-auto">Enter Voucher Detail</div>
                <div class="form-group row mx-2 my-3">
                    <label for="voucher_number" class="col-sm-4 col-form-label">Voucher Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control creditCardText" id="voucher_number" name="voucher_number" onkeypress="allowNumbersOnly(event)" onkeyup="addHyphen(this)">
                    </div>
                </div>
            </div>
            <!-- FLEXEPIN Card Detail Ends -->
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12">
            <div class="card bg-transparent d-flex" style="box-shadow:none">
                <div class="form-input w-100">
                    <h5>Deposit Amount</h5>
                    <input type="number" class="form-control my-2" name="amt_val" id="amount_val" value="" disabled style="border:0; border-bottom: 2px solid #00ff00; background:transparent">
                    <!-- <p name="amt_val" id="amount_val" value=""></p> -->
                </div>
                <div class="form-input w-100">
                    <div class="row">
                        <div class="col-8 mr-0 pr-0">
                            <input type="text" class="form-control my-2" name="coupon_code" id="coupon_code" placeholder="Enter Coupon Code" value="">
                        </div>
                        <div class="col-4 ml-0 pl-0">
                            <input type="button" id="apply_coupon_btn" class="btn btn-sm btn-danger my-2" value="<?=lang('deposit_apply_button')?>">
                        </div>
                    </div>
                </div>
                <p id="coupon-success" class="text-success" style="display:none; font-size:14px;"></p>
                <p id="coupon-error" class="text-danger" style="display:none; font-size:14px;"></p>
                <div class="form-input mt-5 w-100">
                    <h5>Total Amount </h5>
                    <input type="number" name="total_amount" id="total_amount" class="form-control my-2" disabled style="border:0; border-bottom: 2px solid #00ff00; background:transparent">
                    <!-- <span id="total_amount"></span> -->
                </div>
                <input type="button" id="submit_btn" class="btn btn-info btn-block my-2 w-100" style="border-radius:4px; font-weight: 700" value="<?=lang('header_deposit_button')?>">
            </div>
        </div>
    </div>
    <input type="hidden" id="card-type" name="card_type">
    <input type="hidden" id="payment-type" name="payment_type">
    <input type="hidden" id="deposit-amount" name="amount">
    <input type="hidden" id="unique_id" name="unique_id" value="<?=$unique_id?>">
</form>
