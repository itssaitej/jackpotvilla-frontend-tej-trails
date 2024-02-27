<nav id="sidebar">
<?php
    if($this->session->userdata('token'))
    {
        ?>
            <img src="/assets/images/icons/close.svg" id="sidebarClose" class="p-1 mobile" style="height:44px; margin-left: 200px; padding:10px !important; margin-right: 1em;" alt="">
            <!-- <button type="button" id="sidebarCollapse" class="btn btn-warning mobile">
                <i class="fa fa-backward flip_arrow"></i>
                <span></span>
            </button> -->
                <!-- <img src="/assets/images/icons/close.svg" id="sidebarClose" class="ml-2" style="height:44px; margin-left: 200px; padding:0.5em; margin-right: 1em;" alt=""> -->
    <?php
    }
    ?>
    <ul class="list-unstyled components">

    <?php
    if($this->session->userdata('token'))
    {
        ?>
        <li class="nav-item text-center" style="color: #000000"><h5>Welcome,<br> <?=$this->session->userdata('player_name')?></h5></li>
        <?php
    }
    ?>
    <li>
        <a href="<?= base_url() ?>"><img src="/assets/images/icons/home-run.svg" height="25" alt=""><?=lang('side_menu_home')?>
            <span><i class="fa fa-caret-right caret"></span></i>
        </a>
    </li>
<?php
/*
    <li class="nav-item">
        <a href="<?php echo base_url('game/slot') ?>"><img src="/assets/images/icons/slot_blue.svg" height="25" alt="">Slots
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <li class="nav-item">
        <a href="<?php echo base_url('game/roulette') ?>"><img src="/assets/images/icons/roulette_blue.svg" height="25" alt="">Roulette
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url('game/bingo') ?>"><img src="/assets/images/icons/bingo_blue.svg" height="25" alt="">Bingo
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url('game/table') ?>"><img src="/assets/images/icons/gamble_blue.svg" height="25" alt="">Table Games
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>
    */
?>
    <li>
        <a href="<?php echo base_url('player/index') ?>"><img src="/assets/images/icons/account.svg" height="30" alt=""><?=lang('side_menu_my_account')?>
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url('promotions') ?>"><img src="/assets/images/icons/promotion_blue.svg" height="25" alt=""><?=lang('side_menu_promotions')?>
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url('support') ?>"><img src="/assets/images/icons/support_blue.svg" height="25" alt=""><?=lang('side_menu_support')?>
            <i class="fa fa-caret-right caret"></i>
        </a>
    </li>

    <?php
    if($this->session->userdata('token'))
    {
        ?>
        <li>
            <a href="#"><img src="/assets/images/icons/setting_blue.svg" height="25" alt=""><?=lang('side_menu_settings')?>
                <i class="fa fa-caret-right caret"></i>
            </a>
        </li>
        <li>
            <a href="<?= base_url('coupon/redeem') ?>"><img src="/assets/images/icons/coupon_blue.svg" height="20" alt=""><?=lang('side_menu_redeem_coupon')?>
                <i class="fa fa-caret-right caret"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url() ?>auth/logout" class="nav-link logoutbtn"><img src="/assets/images/icons/logout_blue.svg" height="25" alt=""><?=lang('side_menu_logout')?></a>
        </li>
        <?php
    }
    ?>
    </ul>
</nav>
