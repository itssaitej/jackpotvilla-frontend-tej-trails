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
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner d-block">
                    <div class="carousel-item active" data-interval="4000">
                    <div class="carousel_img slide_1 w-100">
                    <img src="./assets/images/slide_1.png" class="img-responsive d-block w-100" alt="...">
                            <div class=" w-100 text_slider1 bg-transparent d-block ml-auto mr-4">
                            <b>GET<br> 400%<br> Bonus<br> on your<br> 1st Deposit</b></div>
                            <a href=""></a><button class="btn btn-warning d-block" data-toggle="modal" data-target="#registerModal">Play Now</button>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="4000">
                    <div class="carousel_img slide_2 w-100">
                    <img src="./assets/images/slide_2.png" class="img-responsive d-block w-100" alt="...">
                    <div class=" w-100 text_slider2 text-center bg-transparent d-block mx-auto" ><b>Join Jackpot Villa <br>NOW & Get INSTANT<br> 5$/&euro;/&#163; <br>FREE</b></div>
                            <button class="btn btn-warning d-block" data-toggle="modal" data-target="#registerModal">JOIN Now</button>
                    </div>
                    </div>
                    <!-- <div class="carousel-item" data-interval="4000">
                    <div class="carousel_img slide_3 w-100">
                    <img src="./assets/images/slide_3.png" class="img-responsive d-block w-100" alt="...">
                    <div class=" w-100 text_slider3 bg-transparent d-block mx-auto"><b>Get 250% Bonus <br>on your first 3 deposits<br>FREE</b></div>
                            <button class="btn btn-warning d-block" data-toggle="modal" data-target="#registerModal">Play NOW</button>
                    </div>
                    </div>-->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <?php
        }
        $this->load->view('common/menu')
        ?>
        <div class="row"></div>

        <div class="container-fluid tab-content">
            <!--div class="row" id="thum-section"></div-->
            <div class="row tab-pane fade show active" id="pills-all-games">
                <?php
                foreach($all_games as $index => $game)
                {

                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-4 card m-0 card_overlay p-1 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" class="hidden-xs" data-target=".bd-game-modal-xl" onclick="openIframe('<?=$game['url']?>')"  data-backdrop="static" data-keyboard="false" id="mobile_modal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>

                                    </div>
                                </a>

                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target="#loginModal">
                                    <div class="text"> Login</div>
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
            <div class="row tab-pane fade" id="pills-top-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    if($game['featured'])
                    {
                        ?>
                        <div class="col-lg-2 col-sm-4 col-xs-4 card m-0 card_overlay p-1 mobile_grid">
                            <!-- <div class="card m-1 card_overlay"> -->
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a data-toggle="modal" class="hidden-xs" data-target=".bd-game-modal-xl" onclick="openIframe('<?=$game['url']?>')" data-backdrop="static" data-keyboard="false" id="mobile_modal">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
                                        </div>

                                </a>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <a data-toggle="modal" data-target="#loginModal">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a data-toggle="modal" data-target="#loginModal">
                                        <div class="text"> Login</div>
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
                }
                ?>
            </div>
            <div class="row tab-pane fade" id="pills-new-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-4 p-1 m-0 card_overlay mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                    <a data-toggle="modal" class="hidden-xs" data-target=".bd-game-modal-xl" onclick="openIframe('<?=$game['url']?>')"  data-backdrop="static" data-keyboard="false">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
                                    </div>
                            </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a data-toggle="modal" data-target="#loginModal">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a data-toggle="modal" data-target="#loginModal">
                                    <div class="text"> Login</div>
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
                    <iframe id="forPostyouradd" name="gameFrame" class="responsive-iframe embed-responsive-item" data-src="" src="about:blank" style="height: 100%; width: 100%; background:#ffffff; display:none" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
</div>


<script type="text/javascript">
    function openIframe(src){
        /*if(mobileAndTabletCheck()){
            window.open(src, '_blank');
        }
        else{
            var iframe  = document.getElementById("forPostyouradd");
            iframe.setAttribute('src', src);
            iframe.style.display = 'block';
        }*/
        var iframe  = document.getElementById("forPostyouradd");
        iframe.setAttribute('src', src);
        iframe.style.display = 'block';
    }

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
              function openIframe(src){
                  window.open('/game/mobile?src=' + encodeURIComponent(src));
              }
    }

</script>

<script>
    function myFunction() {
        let input = document.getElementById('myInput').value
        input=input.toLowerCase();
        let x = document.getElementsByClassName('card_overlay');
        let y = document.getElementsByClassName('mobile_grid');

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display="none";

            }
            else {
                x[i].style.display="block";
            }
        }
    }
    // $("#gameModal").modal("show");
    // $('#gameModal').on('hidden.bs.modal', function () {
    //     $('#gameModal')[0].reset();
    //     });
</script>
