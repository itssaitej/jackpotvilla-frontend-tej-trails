<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_other') ?>
        <div class="card w-75 m-0 p-0 my-5 mx-auto text-center">
            <div class="card bg-transparent m-0 p-0">
                <div class="alert alert-danger m-0 p-4" role="alert">
                    <h4 class="alert-heading">Deposit Failed</h4>
                    <p>Transaction failed due to '<?=$message?>'</p>
                    <?php
                    if(isset($options_left) && $options_left)
                    {
                        ?>
                        <div class="col-md-12">
                            <form action="/" method="post" style="float:left;">
                                <input type="submit" class="btn text-center btn-warning mx-auto" name="no_thanks" value="No Thanks!">
                            </form>
                            <form action="<?=$action?>" method="post" style="float:right;">
                                <input type="submit" class="btn text-center btn-warning mx-auto" name="try_again" value="Try Again">
                            </form>
                        </div>
                        <?php
                    }
                    elseif(isset($card_type) && ($card_type == 'VISA' || $card_type == 'MASTER'))
                    {
                        /*
                        ?>
                        <div class="col-md-12">
                            <form action="/" method="post" style="float:left;">
                                <input type="submit" class="btn text-center btn-warning mx-auto" name="no_thanks" value="No Thanks!">
                            </form>
                            <form action="/deposit/card-process" method="post" style="float:right;">
                                <input type="hidden" name="card_type" value="nexxa">
                                <input type="hidden" name="payment_type" value="card">
                                <input type="hidden" name="amount" value="<?=$amount?>">
                                <input type="submit" class="btn text-center btn-warning mx-auto" name="try_again" value="Try Now">
                            </form>
                        </div>
                        <?php
                        */
                    }
                    ?>
                    <div class="clearfix"></div>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>
