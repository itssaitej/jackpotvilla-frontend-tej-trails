<style>
    #card-holder{
        display: none;
    }
</style>
<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="card bg-transparent m-4 w-80" style="min-height: 60vh">
            <div class="card-header d-block text-white my-4 bg-dark w-50 mx-auto">Deposit with <?=$type?>. Please select any card type.</div>
            <?php
            if(isset($error_message))
            {
                ?>
                <div class="alert alert-danger mx-auto my-4" style="width: 75%; text-align:center;" role="alert"><?=$error_message?></div>
                <?php
            }
            ?>
            <form class="deposit_amount mx-auto mt-2 w-50" action="/deposit/submit" method="post">

                <div class="form-group row w-100 mx-auto">
                    <?php
                    /*
                    switch($gateway)
                    {
                        case 'payofix':
                            ?>
                            <div class="col-sm-4">
                                <img src="/assets/images/Footer/visa.png" height="20" alt="">
                                <input type="radio" name="card_type" value="visa" required onclick="show_card_detail('VISA')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/Mastercard.jpg" height="30" alt="">
                                <input type="radio" name="card_type" value="master" required onclick="show_card_detail('MASTER')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/amex.jpg" height="25" alt="">
                                <input type="radio" name="card_type" value="neosurf" required onclick="show_card_detail('AMEX')">
                            </div>
                            <?php
                            break;
                        case 'wonderland':
                            ?>
                            <div class="col-sm-12" style="text-align:center;">
                                <img src="/assets/images/Mastercard.jpg" height="30" alt="">
                                <input type="radio" name="card_type" value="master" required onclick="show_card_detail('MASTER')" checked>
                            </div>
                            <?php
                            break;
                        case 'boltpay':
                            ?>
                            <div class="col-sm-6">
                                <img src="/assets/images/footer-logos/visa-logo.png" height="20" alt="">
                                <input type="radio" name="card_type" value="visa" required onclick="show_card_detail('VISA')">
                            </div>
                            <div class="col-sm-6">
                                <img src="/assets/images/Mastercard.jpg" height="30" alt="">
                                <input type="radio" name="card_type" value="master" required onclick="show_card_detail('MASTER')">
                            </div>
                            <?php
                            break;
                        case 'wallet88':
                            ?>
                            <div class="col-sm-4">
                                <img src="/assets/images/footer-logos/visa-logo.png" height="20" alt="">
                                <input type="radio" name="card_type" value="visa" required onclick="show_card_detail('VISA')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/Mastercard.jpg" height="30" alt="">
                                <input type="radio" name="card_type" value="master" required onclick="show_card_detail('MASTER')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/amex.jpg" height="25" alt="">
                                <input type="radio" name="card_type" value="amex" required onclick="show_card_detail('AMEX')">
                            </div>
                            <?php
                            break;
                    }*/
                    switch($type)
                    {
                        case 'Flexepin':
                            ?>
                            <input type="hidden" name="card_type" value="flexepin" onclick="show_card_detail('FLEXEPIN')">
                            <?php
                            break;
                        case 'Eft':
                            ?>
                            <input type="hidden" name="card_type" value="eft" onclick="show_card_detail('EFT')">
                            <?php
                            break;
                        default:
                            ?>
                            <div class="col-sm-4">
                                <img src="/assets/images/footer-logos/visa-logo.png" height="20" alt="">
                                <input type="radio" name="card_type" value="visa" required onclick="show_card_detail('VISA')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/Mastercard.jpg" height="30" alt="">
                                <input type="radio" name="card_type" value="master" required onclick="show_card_detail('MASTER')">
                            </div>
                            <div class="col-sm-4">
                                <img src="/assets/images/amex.jpg" height="25" alt="">
                                <input type="radio" name="card_type" value="amex" required onclick="show_card_detail('AMEX')">
                            </div>
                            <?php
                            break;
                    }
                    ?>
                </div>

                <div id = "card-detail">
                    <?php
                    switch($type)
                    {
                        case 'Eft':
                            ?>
                            <div class="form-group row">
                                <label for="cardnumber" class="col-sm-4 col-form-label">Institution Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control creditCardText" id="institution_number" name="institution_number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_expiry_year" class="col-sm-4 col-form-label">Routing Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="routing_no" name="routing_no" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_expiry_month" class="col-sm-4 col-form-label">Account Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="account_no" name="account_no" required>
                                </div>
                            </div>
                            <?php
                            break;
                        default:
                            ?>
                            <div class="form-group row">
                                <label for="cardnumber" class="col-sm-4 col-form-label">16 Digit Card Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control creditCardText" id="card_number" name="card_number" maxlength="19" onkeypress="allowNumbersOnly(event)" onkeyup="addHyphen(this)" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_expiry_year" class="col-sm-4 col-form-label">Card Expiry Year</label>
                                <!-- <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="YYYY" id="card_expiry_year" name="card_expiry_year" required>
                                </div> -->
                                <div class="col-sm-8">
                                    <select class="form-control" id="card_expiry_year" name="card_expiry_year" required onchange="generateMonths(this.value)"></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_expiry_month" class="col-sm-4 col-form-label">Card Expiry Month</label>
                                <div class="col-sm-8">
                                    <!-- <input type="number" class="form-control" id="card_expiry_month" name="card_expiry_month" required> -->
                                    <select class="form-control" id="card_expiry_month" name="card_expiry_month" required></select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_cvv" class="col-sm-4 col-form-label">Card CVV</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="card_cvv" name="card_cvv" maxlength="3" onkeypress="allowNumbersOnly(event)" required>
                                </div>
                            </div>

                            <div class="form-group row" id="card-holder">
                                <label for="card_holder_name" class="col-sm-4 col-form-label">Card Holder Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control creditCardText" id="card_holder_name" name="card_holder_name" value="<?=$name?>">
                                </div>
                            </div>
                            <?php
                            break;
                    }
                    ?>

                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label">Enter Amount</label>
                        <div class="col-sm-8">
                            <input type="number" min="20" class="form-control" step="1" id="amount" name="amount" required placeholder="Min Deposit 20">
                        </div>
                    </div>
                    <?php
                    if($show_coupon)
                    {
                        ?>
                        <div class="form-group row">
                            <label for="coupon_code" class="col-sm-4 col-form-label">Enter Coupon Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="<?=$coupon_code?>">
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="hidden" name="coupon_code" value="">
                        <?php
                    }
                    ?>

                    <div class="form-group row">
                        <input type="hidden" name="merchant_no" value="<?=$merchant_no?>">
                        <input type="hidden" name="gateway_no" value="<?=$gateway_no?>">
                        <input type="hidden" name="transaction_id" value="<?=$transaction_id?>">
                        <input type="hidden" name="unique_id" value="<?=$unique_id?>">
                        <input type="hidden" name="type" value="<?=$type?>">
                        <input type="hidden" name="gateway" value="<?=$gateway?>">
                        <input type="submit" class="btn text-center btn-warning mx-auto" name="deposit" value="Deposit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function show_card_detail(card_type){
        if(card_type == 'VISA'){
            //document.getElementById("card-holder").style.display = 'block';
        }
    }
    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }

    function addHyphen (element) {
        let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }

    var d = new Date();
    var monthArray = new Array();
    monthArray[0] = "January";
    monthArray[1] = "February";
    monthArray[2] = "March";
    monthArray[3] = "April";
    monthArray[4] = "May";
    monthArray[5] = "June";
    monthArray[6] = "July";
    monthArray[7] = "August";
    monthArray[8] = "September";
    monthArray[9] = "October";
    monthArray[10] = "November";
    monthArray[11] = "December";
    var currentYear = (new Date()).getFullYear();
    var currentMonth = (new Date()).getMonth();

    window.onload = function () {
        var ddlYears = document.getElementById("card_expiry_year");
        var option = document.createElement("OPTION");
        option.innerHTML = "Select Year";
        option.value = "";
        ddlYears.appendChild(option);
        for (var i = currentYear; i <= currentYear + 20; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    }

    function generateMonths(selectedYear){
        document.getElementById('card_expiry_month').innerHTML = '';
        var i = 0;
        if(selectedYear == currentYear){
            i = currentMonth;
        }

        for(m = i; m <= 11; m++) {
            var optn = document.createElement("OPTION");
            optn.text = monthArray[m];
            var n = m;
            n++;
            if(m < 9){
                n = '0' + n;
            }
            optn.value = n;
            document.getElementById('card_expiry_month').options.add(optn);
        }
    }

</script>
<script type="text/javascript"
   src="https://pay.wonderlandpay.com/pub/js/fb/tag.js?merNo=<?=$merchant_no?>&gatewayNo=<?=$gateway_no?>&uniqueId=<?=$unique_id?>">
</script>
