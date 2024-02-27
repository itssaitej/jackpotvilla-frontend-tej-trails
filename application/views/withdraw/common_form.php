<form action="/withdraw" method="post">
    <?php
    /*
    <label for="Withdrawal" class=" my-2">Withdrawal Type*</label>
    <select class="custom-select my-2" id="withdrawal" name="type" required>
        <option value="IMPS" <?=(isset($type) && $type == 'IMPS') ? 'selected' : ''?>>IMPS</option>
        <option value="NEFT" <?=(isset($type) && $type == 'NEFT') ? 'selected' : ''?>>NEFT</option>
    </select>
    <label for="account_number" class="my-2">Enter Account Number*</label>
    <input type="password" class="form-control my-2" placeholder="Account Number" name="account_number" required value="<?=isset($account_number) ? $account_number: ''?>">

    <label for="confirm_account_number" class="my-2">Re-Enter Account Number*</label>
    <input type="number" class="form-control my-2" placeholder="Re-Enter Account Number" name="confirm_account_number" required value="<?=isset($confirm_account_number) ? $confirm_account_number: ''?>">

    <label for="account_holder" class="my-2">Account Holder*</label>
    <input type="text" class="form-control my-2" placeholder="Account Holder" name="account_holder" required value="<?=isset($account_holder) ? $account_holder: ''?>">

    <label for="bank_name" class="my-2">Bank Name*</label>
    <input type="text" class="form-control my-2" placeholder="Bank Name" name="bank_name" required value="<?=isset($bank_name) ? $bank_name: ''?>">

    <label for="ifsc_code" class="my-2">IFSC Code*</label>
    <input type="text" class="form-control my-2" placeholder="IFSC Code" name="ifsc_code" required value="<?=isset($ifsc_code) ? $ifsc_code: ''?>">
    */
    ?>

    <label for="Withdrawal" class=" my-2">Enter Amount To Withdraw*</label>
    <input type="number" min="0" class="form-control my-2" step="1" placeholder="Withdraw Amount (Min 50)" name="amount" required value="<?=isset($amount) ? $amount: ''?>">

    <input type="submit" class="btn btn-danger deposit mt-4" name="withdraw" value="Withdraw">
</form>
