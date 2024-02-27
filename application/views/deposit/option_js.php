<script type="text/javascript">
    var coupon_val = 0;
    var r_type = '';
    var selected_amt = 0;

    $('input[name="deposit_amount"]').on('change', function() {
        $('input[name="amt_val"]').val($(this).val());
        $('input[name="other_amount"]').val('');
        selected_amt = document.getElementById('amount_val').value;

        if(selected_amt) {
            if(r_type == 'Percentage'){
                var final_amt = parseInt(selected_amt) + parseInt(selected_amt * coupon_val / 100);
            }
            else{
                var final_amt = parseInt(selected_amt) + parseInt(coupon_val);
            }
            document.getElementById('total_amount').value = final_amt;
            return final_amt;
        }
    });

    $('input[name="other_amount"]').on('change', function() {
        $('input[name="amt_val"]').val($(this).val());
        selected_amt = document.getElementById('amount_val').value;

        if(selected_amt) {
            if(r_type == 'Percentage'){
                var final_amt = parseInt(selected_amt) + parseInt(selected_amt * coupon_val / 100);
            }
            else{
                var final_amt = parseInt(selected_amt) + parseInt(coupon_val);
            }
            document.getElementById('total_amount').value = final_amt;
            return final_amt;
        }
    });

    $('input[name="other_amount"]').on('click', function(event){
        $('input[name="deposit_amount"]').prop('checked', false);
        /*$('input[name="amt_val"]').val('');
        $('input[name="total_amount"]').val('');*/
        $('input[name="amt_val"]').val($(this).val());
        $('input[name="total_amount"]').val($(this).val());
        selected_amt = document.getElementById('amount_val').value;

        if(selected_amt) {
            if(r_type == 'Percentage'){
                var final_amt = parseInt(selected_amt) + parseInt(selected_amt * coupon_val / 100);
            }
            else{
                var final_amt = parseInt(selected_amt) + parseInt(coupon_val);
            }
            document.getElementById('total_amount').value = final_amt;
            return final_amt;
        }
    });

    $('input[name="other_amount"]').on('input', function(){
        $('input[name="amt_val"]').val($(this).val());
        selected_amt = document.getElementById('amount_val').value;

        if(selected_amt) {
            if(r_type == 'Percentage'){
                var final_amt = parseInt(selected_amt) + parseInt(selected_amt * coupon_val / 100);
            }
            else{
                var final_amt = parseInt(selected_amt) + parseInt(coupon_val);
            }
            document.getElementById('total_amount').value = final_amt;
            return final_amt;
        }
    });

    $('#submit_btn').on('click', function() {
        $('#submit_btn').attr('disabled', true);
        let selected_mode = '';

        let mode_of_payments = document.getElementsByName('mode_of_payments');
        mode_of_payments.forEach(function(elem){
            if(elem.checked){
                selected_mode = elem.value;
            }
        });

        if(selected_mode){
            if(!selected_amt){
                window.alert("Please select or put the amount");
                $('#submit_btn').attr('disabled', false);
            }
            else{
                if(selected_mode == 'eft'){
                    if(!document.getElementById("institution_number").value){
                        alert("Please enter institution number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("routing_no").value){
                        alert("Please enter routing number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("account_no").value){
                        alert("Please enter account number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                }
                else if(selected_mode == 'flexepin'){
                    if(!document.getElementById("voucher_number").value){
                        alert("Please enter voucher number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                }
                else if(selected_mode != 'neosurf' && selected_mode != 'emt' && selected_mode != 'nexxa' && selected_mode != 'sofort' && selected_mode != 'trustly' && selected_mode != 'poly' && selected_mode != 'direct_banking' && selected_mode != 'bnp_pay_by_bank' && selected_mode != 'kevin' && selected_mode != 'token'){
                    if(!document.getElementById("card_number").value){
                        alert("Please enter card number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("card_expiry_year").value){
                        alert("Please select card expiry year");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("card_expiry_month").value){
                        alert("Please enter card expiry month");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("card_cvv").value){
                        alert("Please enter card cvv number");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                    if(!document.getElementById("card_holder_name").value){
                        alert("Please enter card holder name");
                        $('#submit_btn').attr('disabled', false);
                        return;
                    }
                }
                document.getElementById("deposit-amount").value = selected_amt;
                document.getElementById("payment-type").value = 'card';
                document.getElementById("card-type").value = selected_mode;
                var form = document['deposit-form'];
                form.submit();
            }
        }
        else{
            window.alert("Please select mode of Payment");
            $('#submit_btn').attr('disabled', false);
        }
    });

    function show_card_form(card_type){
        document.getElementById("normal-card-detail-form").style.display = "none";
        document.getElementById("eft-card-detail-form").style.display = "none";
        document.getElementById("flexepin-card-detail-form").style.display = "none";
        document.getElementById("quick-deposit-text").innerHTML = "Quick Deposit";
        $("#other_amount").attr("placeholder", "Enter Other Amount");
        switch(card_type){
            case 'VISA':
            case 'MASTER':
            case 'AMEX':
            case 'IDEAL':
                document.getElementById("normal-card-detail-form").style.display = "block";
                break;
            case 'FLEXEPIN':
                document.getElementById("flexepin-card-detail-form").style.display = "block";
                document.getElementById("quick-deposit-text").innerHTML = "Voucher Value";
                $("#other_amount").attr("placeholder", "Enter Other Value");
                break;
            case 'EFT':
                document.getElementById("eft-card-detail-form").style.display = "block";
                break;
        }
    }

    $("input").keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

    function submit_form(payment_type, card_type){
        document.getElementById("card-type").value = card_type;
        document.getElementById("payment-type").value = payment_type;
        var form = document['deposit-form'];
        form.submit();
    }

    $("#apply_coupon_btn").on('click', function() {
        document.getElementById("coupon-error").style.display = "none";
        document.getElementById("coupon-success").style.display = "none";
        var coupon_code = document.getElementById("coupon_code").value;
        if(!coupon_code){
            alert("Please enter coupon code");
            return;
        }

        if(!selected_amt){
            alert("Please enter deposit amount");
            return;
        }
        $.ajax({
            type: 'GET',
            url: '/deposit/apply-coupon?cc=' + coupon_code + '&da=' + selected_amt,
            success: function(data){
                data = JSON.parse(data);
                if(!data.error){
                    r_type = data.r_type;
                    coupon_val = data.amount;
                    if(data.r_type == 'Percentage'){
                        var final_amt = parseInt(selected_amt) + parseInt(selected_amt * coupon_val / 100);
                    }
                    else{
                        var final_amt = parseInt(selected_amt) + parseInt(coupon_val);
                    }
                    document.getElementById('total_amount').value = final_amt;
                    document.getElementById("coupon-success").innerHTML = "Congratulation!! Coupon code has been applied successfully. You will receive the amount in your account after successful deposit.";
                    document.getElementById("coupon-success").style.display = "block";
                }
                else{
                    document.getElementById("coupon-error").innerHTML = data.message;
                    document.getElementById("coupon-error").style.display = "block";
                }
            }
        });
    });

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

<script type="text/javascript" src="https://pay.wonderlandpay.com/pub/js/fb/tag.js?merNo=<?=WONDERLANDPAY_MERCHANT_NUMBER?>&gatewayNo=<?=WONDERLANDPAY_GATEWAY_NUMBER?>&uniqueId=<?=$unique_id?>">
</script>
