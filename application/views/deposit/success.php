<?php
if(isset($response['gateway']))
{
    switch($response['gateway'])
    {
        case 'WALLET88_SOFORT':
            ?>
            <form action="<?=$response['gateway_redirect_url']?>" method="post" id="wallet88-form-sofort">
                <input type="hidden" name="sid" value="<?=$response['sid']?>">
                <input type="hidden" name="tid" value="<?=$response['tid']?>">
                <input type="hidden" name="hash" value="<?=$response['hash']?>">
                <input type="hidden" name="postback_url" value="<?=$response['postback_url']?>">
                <input type="hidden" name="redirect_url" value="<?=$response['redirect_url']?>">
                <input type="hidden" name="timestamp" value="<?=$response['timestamp']?>">
                <input type="hidden" name="firstname" value="<?=$response['firstname']?>">
                <input type="hidden" name="lastname" value="<?=$response['lastname']?>">
                <input type="hidden" name="email" value="<?=$response['email']?>">
                <input type="hidden" name="phone" value="<?=$response['mobile']?>">
                <input type="hidden" name="address" value="<?=$response['address']?>">
                <input type="hidden" name="suburb_city" value="<?=$response['suburb_city']?>">
                <input type="hidden" name="postcode" value="<?=$response['postcode']?>">
                <input type="hidden" name="country" value="<?=$response['country']?>">
                <input type="hidden" name="currency" value="<?=$response['currency']?>">
                <input type="hidden" name="amount_shipping" value="<?=$response['amount_shipping']?>">
                <input type="hidden" name="amount_tax" value="<?=$response['amount_tax']?>">
                <input type="hidden" name="amount_coupon" value="<?=$response['amount_coupon']?>">
                <input type="hidden" name="item_quantity[]" value="<?=$response['item_quantity']?>">
                <input type="hidden" name="item_name[]" value="<?=$response['item_name']?>">
                <input type="hidden" name="item_no[]" value="<?=$response['item_no']?>">
                <input type="hidden" name="item_desc[]" value="<?=$response['item_desc']?>">
                <input type="hidden" name="item_amount_unit[]" value="<?=$response['item_amount_unit']?>">
                <input type="hidden" name="state" value="<?=$response['state']?>">
                <input type="hidden" name="tx_action" value="PREAUTH">
                <!--input type="submit" value="Submit"-->
            </form>
            <script type="text/javascript">
                //alert("Submit Sofort");
                document.getElementById("wallet88-form-sofort").submit();
            </script>
            <?php
            exit;
            break;
        case 'WALLET88_OTHER':
            ?>
            <form action="<?=$response['gateway_redirect_url']?>" method="post" id="wallet88-form">
                <input type="hidden" name="sid" value="<?=$response['sid']?>">
                <input type="hidden" name="tid" value="<?=$response['tid']?>">
                <input type="hidden" name="postback_url" value="<?=$response['postback_url']?>">
                <input type="hidden" name="redirect_url" value="<?=$response['redirect_url']?>">
                <input type="hidden" name="timestamp" value="<?=$response['timestamp']?>">
                <input type="hidden" name="hash" value="<?=$response['hash']?>">
                <input type="hidden" name="firstname" value="<?=$response['firstname']?>">
                <input type="hidden" name="lastname" value="<?=$response['lastname']?>">
                <input type="hidden" name="email" value="<?=$response['email']?>">
                <input type="hidden" name="phone" value="<?=$response['mobile']?>">
                <input type="hidden" name="address" value="<?=$response['address']?>">
                <input type="hidden" name="suburb_city" value="<?=$response['suburb_city']?>">
                <input type="hidden" name="postcode" value="<?=$response['postcode']?>">
                <input type="hidden" name="country" value="<?=$response['country']?>">
                <input type="hidden" name="currency" value="<?=$response['currency']?>">
                <input type="hidden" name="amount_shipping" value="<?=$response['amount_shipping']?>">
                <input type="hidden" name="amount_tax" value="<?=$response['amount_tax']?>">
                <input type="hidden" name="amount_coupon" value="<?=$response['amount_coupon']?>">
                <input type="hidden" name="card_type" value="<?=$response['card_type']?>">
                <input type="hidden" name="card_no" value="<?=$response['card_no']?>">
                <input type="hidden" name="card_name" value="<?=$response['card_name']?>">
                <input type="hidden" name="card_ccv" value="<?=$response['card_ccv']?>">
                <input type="hidden" name="card_exp_month" value="<?=$response['card_exp_month']?>">
                <input type="hidden" name="card_exp_year" value="<?=$response['card_exp_year']?>">
                <input type="hidden" name="item_quantity[]" value="<?=$response['item_quantity']?>">
                <input type="hidden" name="item_name[]" value="<?=$response['item_name']?>">
                <input type="hidden" name="item_no[]" value="<?=$response['item_no']?>">
                <input type="hidden" name="item_desc[]" value="<?=$response['item_desc']?>">
                <input type="hidden" name="item_amount_unit[]" value="<?=$response['item_amount_unit']?>">
                <input type="hidden" name="state" value="<?=$response['state']?>">
                <input type="hidden" name="institution_number" value="<?=$response['institution_number']?>">
                <input type="hidden" name="routing_no" value="<?=$response['routing_no']?>">
                <input type="hidden" name="account_no" value="<?=$response['account_no']?>">
                <!--input type="submit" value="Submit"-->
            </form>
            <script type="text/javascript">
                //alert("Submit Other");
                document.getElementById("wallet88-form").submit();
            </script>
            <?php
            exit;
            break;
        default:
            ?>
            <div class="wrapper">
                <?php $this->load->view('common/side-menu') ?>
                <div id="content" class="w-100">
                    <?php $this->load->view('common/casino_menu_other') ?>

                    <div class="card w-75 m-0 p-0 my-5 mx-auto text-center">
                        <div class="card bg-transparent m-0 p-0">
                            <div class="alert alert-success m-0 p-4" role="alert">
                                <h4 class="alert-heading">Deposit Success</h4>
                                <p><?=$message?><br/><br/><?=isset($coupon_message) ? $coupon_message : ''?></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;
    }
}
else
{
    ?>
    <div class="wrapper">
        <?php $this->load->view('common/side-menu') ?>
        <div id="content" class="w-100">
            <?php $this->load->view('common/casino_menu_other') ?>

            <div class="card w-75 m-0 p-0 my-5 mx-auto text-center">
                <div class="card bg-transparent m-0 p-0">
                    <div class="alert alert-success m-0 p-4" role="alert">
                        <h4 class="alert-heading">Deposit Success</h4>
                        <p><?=$message?><br/><br/><?=isset($coupon_message) ? $coupon_message : ''?></p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
