<div class="wrapper">
<?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
    <?php $this->load->view('common/casino_menu_other') ?>
    <?php
        if(!$this->session->userdata('token'))
        {
            ?>
    <div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
                            
                                <img src="./assets/images/Slider/desktop/slider_1.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobileslider01.jpg" class="d-block w-100 d-xs-block d-md-none carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                    <div class="container container_caption"
                                    >
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                        <button class="btn play_button mt-2" data-toggle="modal" data-target="#registerModal"><?=lang('home_play_now_button')?></button>
                                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
                            
                                <img src="./assets/images/Slider/desktop/slider_2.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobileslider02.jpg" class="d-block w-100 d-xs-block d-md-none carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                        <div class="container container_caption_1">
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                        <button class="btn play_button mt-2" data-toggle="modal" data-target="#registerModal"><?=lang('home_play_now_button')?></button>
                                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
                            
                                <img src="./assets/images/Slider/desktop/slider_3.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobile_slider03.jpg" class="d-block w-100 carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                    <div class="container container_caption1">
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                        <button class="btn play_button mt-2" data-toggle="modal" data-target="#registerModal"><?=lang('home_play_now_button')?></button>
                                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <?php
        }
        else {
        ?>




<div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
 
                                <img src="./assets/images/Slider/desktop/slider_1.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobileslider01.jpg" class="d-block w-100 d-xs-block d-md-none carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                    <div class="container container_caption"
                                    >
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                       
                                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
                            
                                <img src="./assets/images/Slider/desktop/slider_2.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobileslider02.jpg" class="d-block w-100 d-xs-block d-md-none carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                    <div class="container container_caption_1"
                                    >
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
                                        </div>
                                        <button class="btn play_button mt-2" data-toggle="modal" data-target="#registerModal"><?=lang('home_play_now_button')?></button>
                                    </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <div class="row m-0 p-0 d-block mx-auto">
        <div class="card mx-3 my-4">
            <div class="card-img">
            <div class="carousel-item active">
            <!-- <picture>
                            <source
                                media="(min-width: 640px)",
                                srcset="./assets/images/Slider/desktop/background.jpg"
                            >
                            <source
                                media="(max-width: 640px)",
                                srcset="./assets/images/Slider/mobile/background.jpg" -->
                            
                                <img src="./assets/images/Slider/desktop/slider_3.jpg" class="d-block w-100 d-none d-md-block carousel_img img-fluid desktop" style="width: 100% !important" alt="...">
                                <img src="./assets/images/Slider/mobile/mobile_slider03.jpg" class="d-block w-100 carousel_img img-fluid mobile" style="width: 100% !important" alt="...">
                            <!-- </picture> -->
                    <!-- <img src="./assets/images/Slider/desktop/character.png" class="character_img d-none d-md-block w-auto" height="50"
                        alt="..."> -->
                    <div class="carousel-caption m-0">
                    <div class="container container_caption1"
                                    >
                                        <h3 class="text-white welcome_text"><u><?=lang('home_welcome_bonus')?></u></h3>
                                        <div>
                                            <h1>400%</h1>
                                        </div>
                                        <div>
                                            <h3 class="text-white caption_h3"><?=lang('home_up_to')?> &euro;2000</h3>
                                        </div>
                                        <div>
                                            <p class="text-white caption_p"><?=lang('home_on_your')?> <?=lang('home_first_deposit')?></p>
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
</div>
</div>

<script>
    
</script>
