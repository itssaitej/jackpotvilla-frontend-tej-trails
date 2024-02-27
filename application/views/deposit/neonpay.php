<form action="<?=$response['redirect_url']?>" method="<?=$response['redirect_method']?>" id="neonpay-form">
    <?php
    foreach($response['redirect_params'] as $key => $value)
    {
        ?>
        <input type="hidden" name="<?=$key?>" value="<?=$value?>">
        <?php
    }
    ?>
</form>
<script type="text/javascript">
    document.getElementById("neonpay-form").submit();
</script>
