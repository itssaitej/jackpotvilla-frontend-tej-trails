<div class="wrapper">
    <?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
        <?php $this->load->view('common/casino_menu_home') ?>
        <div class="container-fluid tab-content">
            <!--div class="row" id="thum-section"></div-->
            <div class="tab-pane fade show active p-2 live_games" id="pills-all-games">
                <div class="row">
                    <?php
                    foreach($all_games as $index => $game)
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
                                                <img src="/assets/images/roulette.png"  height="40" alt="">
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="/assets/images/table_games.png" height="40" alt="">
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
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">1</span>
                                                        </div>
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">2</span>
                                                        </div>
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">3</span>
                                                        </div>
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">4</span>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0 my-1 w-100">
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">5</span>
                                                        </div>
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                            <span class="seat_num">6</span>
                                                        </div>
                                                        <div class="col-3 m-0 p-0">
                                                            <img src="/assets/images/seat_black.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                                                <img src="/assets/images/seat_black.svg" height="24" alt="">
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <img src="/assets/images/seat_white.svg" height="24" alt="">
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
                                        <img src="<?=$game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                            <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                                <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play Now</div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?=$game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                            <a href="#">
                                                <div class="text"> Login</div>
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
            </div>
        </div>
    </div>
    <div class="modal fade bd-game-modal-xl" id="gameModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body m-0 p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="embed-responsive embed-responsive-16by9 responsive_iframe">
                        <iframe id="forPostyouradd" class="responsive-iframe embed-responsive-item" data-src="" src="about:blank" style="height: 100%; width: 100%; background:#ffffff; display:none" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function openIframe(src)
    {
        var iframe  = document.getElementById("forPostyouradd");
        iframe.setAttribute('src', src);
        iframe.style.display = 'block';
    }

    // Search Function
    function myFunction()
    {
        let input = document.getElementById('myInput').value
        input=input.toLowerCase();
        let x = document.getElementsByClassName('card_overlay');
        let y = document.getElementsByClassName('mobile_grid');

        for (i = 0; i < x.length; i++)
        {
            if (!x[i].innerHTML.toLowerCase().includes(input))
            {
                x[i].style.display="none";
            }
            else
            {
                x[i].style.display="block";
            }
        }
    }
</script>
