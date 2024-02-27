<style>
    .tab-content > .active{
        display: flex;
    }

    .content {
        width: 100% !important
    }
</style>
<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="content">
        <?php
        if(!$this->session->userdata('token'))
        {
            ?>
                <div class="jumbotron m-0 p-0 banner_container">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-ride="carousel">
                        <!-- <ol class="carousel-indicators mx-auto">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol> -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg"
                            >-->
                                <img src="./assets/images/Slider/desktop/background1.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                                <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto"
                                    alt="...">-->
                                <div class="carousel-caption m-0">
                                    <div class="container container_caption"
                                    >
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> <?=$currency_symbol?>900</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                        <button class="btn play_button mt-5" data-toggle="modal" data-target="#registerModal"><?=lang('home_play_now_button')?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" style="z-index:99">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next" style="z-index:99">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div>
            <?php
        }
        $this->load->view('common/casino_menu_other')
        ?>

        <div class="container-fluid tab-content" id="pills-all-games">
            <div class="row tab-pane fade <?=$current_tab == 'pills-featured' ? 'show active' : ''?> p-2" id="pills-featured">
                <?php
                foreach($all_games['Yggdrasil'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-newgames' ? 'show active' : ''?>" id="pills-newgames">
                <?php
                foreach($all_games['Netent'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-videoslots' ? 'show active' : ''?>" id="pills-videoslots">
                <?php
                foreach($all_games['Video Slots'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-tablegames' ? 'show active' : ''?>" id="pills-tablegames">
                <?php
                foreach($all_games['Table Games'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 live_games <?=$current_tab == 'pills-livegames' ? 'show active' : ''?>" id="pills-livegames">
                <?php
                foreach($all_games['Live Games'] as $index => $game)
                {
                    ?>
                    <div class="col-lg-4 col-sm-6 col-xs-12 mt-4 live_games_grid">
                        <div class="live_grid_container m-1 p-0">
                            <div class="game_container text-white">
                                <div class="card-header text-center py-1">
                                    <div class="row w-100 text-center d-flex m-auto" style="margin: auto !important; align-items: center;justify-content: center;">
                                        <?php
                                        if(stripos($game['type'], 'Roulette') !== FALSE)
                                        {
                                            ?>
                                            <img loading=lazy src="/assets/images/roulette.png"  height="40" alt="">
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img loading=lazy src="/assets/images/table_games.png" height="40" alt="">
                                            <?php
                                        }
                                        ?>
                                        &nbsp;<span><h5><?=$game['display_name']?></h5></span>
                                    </div>
                                    <!--MIN: MAX: -->
                                </div>

                                <div class="overlay d-block mx-auto">
                                    <?php
                                    if(stripos($game['type'], 'Roulette') !== FALSE)
                                    {
                                        ?>
                                        <div class="overlay_icons overlay_roulette text-center mx-auto" id="<?="game-" . $game['reference_code']?>">
                                            <span class="overlay_header">Recent Numbers</span>
                                            <?php
                                            foreach($game['result'] as $index => $result)
                                            {
                                                if($index % 2 == 0)
                                                {
                                                    ?>
                                                    <div class="row m-0 p-0 my-1 w-50">
                                                    <?php
                                                }
                                                ?>
                                                <div class="col-6  m-0 p-0">
                                                    <?php
                                                    if(in_array($result, $black_numbers))
                                                    {
                                                        ?>
                                                        <div class="black"><?=$result?></div>
                                                        <?php
                                                    }
                                                    else if(in_array($result, $red_numbers))
                                                    {
                                                        ?>
                                                        <div class="red"><?=$result?></div>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="green"><?=$result?></div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                if($index % 2 != 0)
                                                {
                                                    ?>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            if($index % 2 == 0)
                                            {
                                                ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        if(!$game['noof_seats'] || $game['noof_seats'] == $game['occupied_seats'])
                                        {
                                            ?>
                                            <div class="overlay_icons seats_avail text-center m-auto" id="<?="game-" . $game['reference_code']?>">
                                                <span class="overlay_header ">No Seat Available</span>
                                                <div class="row m-0 p-0 my-1 w-75">
                                                    <div class="col-3  m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">1</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">2</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">3</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">4</span>
                                                    </div>
                                                </div>
                                                <div class="row m-0 p-0 my-1 w-100">
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">5</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">6</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                        <span class="seat_num">7</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0"></div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="overlay_icons seats_avail text-center m-auto" id="<?="game-" . $game['reference_code']?>">
                                                <span class="overlay_header ">Seats Available</span>
                                                <div class="row m-0 p-0 my-1 w-75">
                                                    <div class="col-3 mb-1 p-0">
                                                        <?php
                                                        if(in_array(0, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">1</span>
                                                    </div>
                                                    <div class="col-3 mb-1 p-0">
                                                        <?php
                                                        if(in_array(1, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">2</span>
                                                    </div>
                                                    <div class="col-3 mb-1 p-0">
                                                        <?php
                                                        if(in_array(2, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">3</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <?php
                                                        if(in_array(3, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">4</span>
                                                    </div>
                                                <!-- </div>
                                                <div class="row m-0 p-0 my-1 w-100"> -->
                                                    <div class="col-3 m-0 p-0">
                                                        <?php
                                                        if(in_array(4, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">5</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <?php
                                                        if(in_array(5, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">6</span>
                                                    </div>
                                                    <div class="col-3 m-0 p-0">
                                                        <?php
                                                        if(in_array(6, $game['occupied_seat_ids']))
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <img loading=lazy src="/assets/images/seat_white.svg" height="24" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                        <span class="seat_num">7</span>
                                                    </div>
                                                    <!-- <div class="col-3 m-0 p-0"></div> -->
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="name_container"><?=$game['dealer_name']?></div>
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <img loading=lazy src="<?=$game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                        <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                            <div class="text" onclick="openIframe('<?=$game['url']?>')"> <?=lang('home_play_now_button')?></div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <img loading=lazy src="<?=$game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                        <a href="#">
                                            <div class="text"> <?=lang('header_login_button')?></div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-allgames' ? 'show active' : ''?>" id="pills-allgames">
                <?php
                foreach($all_games['All Games'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-diceandreel' ? 'show active' : ''?>" id="pills-diceandreel">
                <?php
                foreach($all_games['DiceandReel'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-netent' ? 'show active' : ''?>" id="pills-netent">
                <?php
                foreach($all_games['Netent'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')">
                                    <img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt="">
                                </div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-fugaso' ? 'show active' : ''?>" id="pills-fugaso">
                <?php
                foreach($all_games['Fugaso'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">

                                    <div class="middle">

                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-vivo' ? 'show active' : ''?>" id="pills-vivo">
                <?php
                foreach($all_games['Vivo-Betsoft'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-yggdrasil' ? 'show active' : ''?>" id="pills-yggdrasil">
                <?php
                foreach($all_games['Yggdrasil'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block  card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-novomatic' ? 'show active' : ''?>" id="pills-novomatic">
                <?php
                foreach($all_games['Novomatic'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block  card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-playtech' ? 'show active' : ''?>" id="pills-playtech">
                <?php
                foreach($all_games['Playtech'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-egt' ? 'show active' : ''?>" id="pills-egt">
                <?php
                foreach($all_games['EGT'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-amatic' ? 'show active' : ''?>" id="pills-amatic">
                <?php
                foreach($all_games['Amatic'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block  card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-aristocrat' ? 'show active' : ''?>" id="pills-aristocrat">
                <?php
                foreach($all_games['Aristocrat'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-pragmatic' ? 'show active' : ''?>" id="pills-pragmatic">
                <?php
                foreach($all_games['PragmaticPlay'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-tomhorn' ? 'show active' : ''?>" id="pills-tomhorn">
                <?php
                foreach($all_games['TomHorn'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-bgaming' ? 'show active' : ''?>" id="pills-bgaming">
                <?php
                foreach($all_games['BGaming'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-hacksaw' ? 'show active' : ''?>" id="pills-hacksaw">
                <?php
                foreach($all_games['Hacksaw'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-justplay' ? 'show active' : ''?>" id="pills-justplay">
                <?php
                foreach($all_games['Justplay'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-merkurgame' ? 'show active' : ''?>" id="pills-merkurgame">
                <?php
                foreach($all_games['MerkurGame'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-spinomenal' ? 'show active' : ''?>" id="pills-spinomenal">
                <?php
                foreach($all_games['Spinomenal'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-belatra' ? 'show active' : ''?>" id="pills-belatra">
                <?php
                foreach($all_games['Belatra'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tab-pane fade p-2 <?=$current_tab == 'pills-kingsplay' ? 'show active' : ''?>" id="pills-kingsplay">
                <?php
                foreach($all_games['KingPlay'] as $index => $game)
                {
                    ?>
                    <div class="col-auto d-block card card_overlay p-0 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                    <div class="play" onclick="openIframe('<?=$game['url']?>')"><img loading=lazy src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img loading=lazy src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <img loading=lazy src="/assets/images/GameGrid/Ribbon_hotGames.png" class="ribbon_tag" alt="">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text"> <?=lang('header_login_button')?></div>
                                    </a>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    <!-- </nav> -->
    </div>
</div>
<?php
        if(!$this->session->userdata('token'))
        {
            ?>
    <div class="wrapper m-0 p-0 bonus_bg"
        style="">
        <div class="container mx-auto">
            <h2 class="text-white text-center" style="font-weight: 700; padding-top: 1em !important;font-family: antonFont"><?=lang('home_welcome_package')?></h2>
            <div class="row mt-4">
                <div class="col-lg-6 col-xs-12d-xs-none"></div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card bonus_info d-flex m-auto align-items-center">
                        <div class="row">
                        <div class="col-4">
                            <img src="assets/images/bonus/1.png" class="img-fluid" height="25" style="height: 100px" alt="">
                        </div>
                        <div class="col-8">
                            <div class="card-body text-white">
                                <div style="font-size: 24px;">
                                    <b><?=lang('home_first_deposit')?></b></div>
                                <p style="text-transform: uppercase; font-size: 18px"><b><?=lang('home_welcome_package_get')?> 400% <?=lang('home_bonus')?> <?=lang('home_on_your')?> <?=lang('home_welcome_package_1st')?> <?=lang('home_deposit')?></b></p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-xs-12d-xs-none"></div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card bonus_info d-flex m-auto align-items-center">
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/bonus/2.png" class="img-fluid" height="25" style="height: 100px" alt="">
                            </div>
                            <div class="col-8">
                                <div class="card-body text-white">
                                    <div style="font-size: 24px;">
                                        <b><?=lang('home_second_deposit')?></b></div>
                                    <p style="text-transform: uppercase; font-size: 18px"><b><?=lang('home_welcome_package_get')?> 250% <?=lang('home_bonus')?> <?=lang('home_on_your')?> <?=lang('home_welcome_package_2nd')?> <?=lang('home_deposit')?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-xs-12d-xs-none"></div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card bonus_info d-flex m-auto align-items-center">
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/bonus/3.png" class="img-fluid" height="25" style="height: 100px" alt="">
                            </div>
                            <div class="col-8">
                                <div class="card-body text-white">
                                    <div style="font-size: 24px;">
                                        <b><?=lang('home_third_deposit')?></b></div>
                                    <p style="text-transform: uppercase; font-size: 18px"><b> <?=lang('home_welcome_package_get')?> 250% <?=lang('home_bonus')?> <?=lang('home_on_your')?> <?=lang('home_welcome_package_3rd')?> <?=lang('home_deposit')?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
        }
    ?>

    <div class="modal fade bd-game-modal-xl" id="gameModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title text-center">Login</h5> -->
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 responsive_iframe">
                    <iframe id="forPostyouradd" class="responsive-iframe embed-responsive-item" data-src="" src="about:blank" style="height: 100%; width: 100%; background:#ffffff; display:none" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
</div>
<script type="text/javascript">
    function openIframe(src){
        var iframe  = document.getElementById("forPostyouradd");
        iframe.setAttribute('src', src);
        iframe.style.display = 'block';
        //window.open('/game/mobile?src=' + encodeURIComponent(src));
    }
</script>
