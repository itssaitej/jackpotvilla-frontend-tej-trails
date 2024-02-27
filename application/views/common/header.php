<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$pageTitle?></title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
        <link href="/assets/css/addons/datatables.min.css?v=<?=CSS_VERSION?>" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/style.css?v=<?=CSS_VERSION?>">
        <link rel="stylesheet" href="/assets/css/jquery-ui.css?v=<?=CSS_VERSION?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css" integrity="sha256-AjyoyaRtnGVTywKH/Isxxu5PXI0s4CcE0BzPAX83Ppc=" crossorigin="anonymous" />
        <?php
        if(CURRENT_ENV == 'live')
        {
            ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-T4R4LTKTCT"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-T4R4LTKTCT');
            </script>
            <?php
        }

        $current_language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'English_EN';
        ?>

    </head>

    <body>
        <?php
        if($this->session->userdata('token'))
        {
            ?>
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <div class="container">
                <img src="/assets/images/icons/menu.svg" id="sidebarCollapse" class="ml-2" style="height:44px; margin-left: 2em !important" alt="">
                <!-- <div class="row m-0 mr-0 p-0 w-100">
                    <div class="col-lg-8 col-xs-12 m-0 p-2"> -->
                        <a class="navbar-brand d-block text-center mx-auto" href="<?php echo base_url() ?>">
                            <img src="/assets/images/logo_new.png" class="mx-auto animate" alt="" height="60">
                        </a>
                    <!-- </div>
                    <div class="col-lg-4 col-xs-12 m-0 p-0 w-100 top_menu my-2 ml-auto"> -->
                        <!-- <button class="navbar-toggler mr-2 ml-auto header_block text-dark" type="button" data-toggle="collapse" data-target="#header_bar">
                            <span class="navbar-toggler-icon"></span>
                        </button> -->
                        <!-- <div class="collapse navbar-collapse" id="header_bar"> -->
                            <div class="d-block m-0 p-0 py-2 justify-content-end">
                                <ul class="navbar list-group list-group-horizontal navbar-expand-lg text-white deposit_nav justify-content-end" style="box-shadow: none !important;">
                                    <!-- <li class="nav-item"><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="nav-item"><a href="<?= base_url() ?>player/index">My Account</a></li> -->

                                    <li class="nav-item" id="player-balance">Total Balance: <br><?=$this->session->userdata('currency') . " " . $this->session->userdata('balance')?></li>
                                    <li class="nav-item deposit text-black"><a href="<?php echo base_url() ?>deposit/option"><?=lang('header_deposit_button')?></a></li>
                                    <li class="nav-item btnFlag">
                                        <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" style='border:0; padding-left:0;box-shadow:none' aria-expanded="false">
                                            <?php
                                            switch($current_language)
                                            {
                                                case 'French_FR':
                                                    echo '<img src="/assets/images/fr.png" height="24" alt="">';
                                                    break;
                                                case 'German_DE':
                                                    echo '<img src="/assets/images/de.png" height="24" alt="">';
                                                    break;
                                                case 'Swedish_SW':
                                                    echo '<img src="/assets/images/sw.png" height="24" alt="">';
                                                    break;
                                                default:
                                                    echo '<img src="/assets/images/en.png" height="24" alt="">';
                                                    break;
                                            }
                                            ?>
                                        </button>
                                        <div class="dropdown-menu flag_icons">
                                            <ul>
                                                <?php
                                                if($current_language != 'English_EN')
                                                {
                                                    ?>
                                                    <li>
                                                        <div class="row" onclick="change_language('English_EN')">
                                                            <img src="/assets/images/en.png" height='24' alt=""> EN
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                if($current_language != 'French_FR')
                                                {
                                                    ?>
                                                    <li>
                                                        <div class="row" onclick="change_language('French_FR')">
                                                            <img src="/assets/images/fr.png" height='24' alt=""> FR
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                if($current_language != 'German_DE')
                                                {
                                                    ?>
                                                    <li>
                                                        <div class="row" onclick="change_language('German_DE')">
                                                            <img src="/assets/images/de.png" height='24' alt=""> DE
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                if($current_language != 'Swedish_SW')
                                                {
                                                    ?>
                                                    <li>
                                                        <div class="row" onclick="change_language('Swedish_SW')">
                                                            <img src="/assets/images/sw.png" height='24' alt=""> SW
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
            </nav>
            <?php
        }
        else
        {
            ?>
            <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container">
            <!-- <img src="/assets/images/icons/menu.svg" class="ml-2" style="height:44px" alt=""> -->
               <!-- <div class="row m-0 mr-2 p-0 w-100">
                   <div class="col-lg-3 col-xs-12 m-0 p-2"> -->
                       <a class="navbar-brand d-block mr-auto " href="<?php echo base_url() ?>">
                           <img src="/assets/images/logo_new.png?v=<?=IMAGE_VERSION?>" class="animate" alt="" height="60">
                       </a>
                   <!-- </div>
                   <div class="col-lg-9 col-xs-12 m-0 p-0 w-100 menu_flex my-2 ml-auto desktop"> -->
                       <button type="submit" class="btn login_btn my-2 mr-2" id="login" data-toggle="modal" data-target="#loginModal"><?=lang('header_login_button')?></button>
                       <button type="submit" class="btn my-2 mr-2 btn_reg" id="register"
                       data-toggle="modal" data-target="#registerModal"><?=lang('header_register_button')?></button>
                        <button type="button" class="btn dropdown-toggle flagBtn btnFlag" data-toggle="dropdown" aria-haspopup="true" style='border:0' aria-expanded="false">
                            <?php
                            switch($current_language)
                            {
                                case 'French_FR':
                                    echo '<img src="/assets/images/fr.png" height="24" alt="">';
                                    break;
                                case 'German_DE':
                                    echo '<img src="/assets/images/de.png" height="24" alt="">';
                                    break;
                                case 'Swedish_SW':
                                    echo '<img src="/assets/images/sw.png" height="24" alt="">';
                                    break;
                                default:
                                    echo '<img src="/assets/images/en.png" height="24" alt="">';
                                    break;
                            }
                            ?>
                        </button>
                        <div class="dropdown-menu flagIcon">
                            <ul>
                                <?php
                                if($current_language != 'English_EN')
                                {
                                    ?>
                                    <li>
                                        <div class="row" onclick="change_language('English_EN')">
                                            <img src="/assets/images/en.png" height='24' alt=""> EN
                                        </div>
                                    </li>
                                    <?php
                                }
                                if($current_language != 'French_FR')
                                {
                                    ?>
                                    <li>
                                        <div class="row" onclick="change_language('French_FR')">
                                            <img src="/assets/images/fr.png" height='24' alt=""> FR
                                        </div>
                                    </li>
                                    <?php
                                }
                                if($current_language != 'German_DE')
                                {
                                    ?>
                                    <li>
                                        <div class="row" onclick="change_language('German_DE')">
                                            <img src="/assets/images/de.png" height='24' alt=""> DE
                                        </div>
                                    </li>
                                    <?php
                                }
                                if($current_language != 'Swedish_SW')
                                {
                                    ?>
                                    <li>
                                        <div class="row" onclick="change_language('Swedish_SW')">
                                            <img src="/assets/images/sw.png" height='24' alt=""> SW
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                   </div>
               </div>

               <nav class="navbar navbar-expand-md d-none">
                   <button type="submit" class="btn login_btn my-2 mr-2" id="login" data-toggle="modal" data-target="#loginModal"><?=lang('header_login_button')?></button>
                   <button type="submit" class="btn my-2 mr-2 btn_reg" id="register"
                   data-toggle="modal" data-target="#registerModal"><?=lang('header_register_button')?></button>
               </nav>
               </div>
           </nav>
            <?php
        }
        ?>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><?=lang('header_login_button')?></h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="login_form" method="post" action="/auth/login">
                            <div class="form-group">
                                <label for="username">Username or Email*</label>
                                <input type="text" class="form-control" id="login_username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="login_password" name="password" required>
                            </div>
                            <input type="submit" class="btn login_btn" name="login" value="<?=lang('header_login_button')?>">
                            <a href="<?php echo base_url()?>forgot_password"><small><span class="pt-4 float-right">Forgot password</span></small></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><?=lang('header_register_button')?></h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="registration_form" action="/auth/register" method="post">

                            <div class="form-group">
                                <label for="username">Username*</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email*</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="Phone">Phone Number*</label>
                                <input type="number" class="form-control" id="phone_number" name="mobile" required>
                            </div>

                            <div class="form-group">
                                <label for="Country">Country*</label>
                                <select class="custom-select" id="countries_list" name="country_id" required>
                                    <option value="">-- Choose --</option>
                                    <?php
                                    $countries = get_all_countries();
                                    foreach($countries as $country)
                                    {
                                        ?>
                                        <option value="<?=$country['id']?>"><?=$country['name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" class="mt-2" name="tnc" id="tnc">
                                <label for="18"><small><a href="/terms_and_conditions" style="color: red"><?=lang('header_18_plus')?></a></small></label>
                            </div>
                            <input type="submit" class="btn btn_reg" name="register" value="<?=lang('header_register_button')?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
