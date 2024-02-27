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
        $this->load->view('common/menu')
        ?>
        <div class="row"></div>

        <div class="container-fluid tab-content">
            <!--div class="row" id="thum-section"></div-->
            <div class="row tab-pane fade show active p-2" id="pills-all-games">
                <?php
                foreach($all_games as $index => $game)
                {

                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-4 card card_overlay p-1 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false" class="hidden-xs">
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
                                    <a href="#">
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
            <div class="row tab-pane fade p-2" id="pills-top-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    if($game['featured'])
                    {
                        ?>
                        <div class="col-lg-2 col-sm-4 col-xs-4 d-block card card_overlay p-1 mobile_grid">
                            <!-- <div class="card m-1 card_overlay"> -->
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false" class="hidden-xs">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
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
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
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
            <div class="row tab-pane fade p-0" id="pills-new-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    ?>
                    <div class="col-lg-2 col-sm-4 col-xs-4 d-block card card_overlay p-1 mobile_grid">
                        <!-- <div class="card m-1 card_overlay"> -->
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false" class="hidden-xs">
                                    <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a href="#">
                                    <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
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
                                    <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                    <div class="middle">
                                    <a href="#">
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
            <div class="row tab-pane fade p-0" id="pills-roulette-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    if($game['type'] == 'Roulette')
                    {
                        ?>
                        <div class="col-lg-2 col-sm-4 col-xs-4 d-block card card_overlay p-1 mobile_grid">
                            <!-- <div class="card m-1 card_overlay"> -->
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false" class="hidden-xs">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
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
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
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
            <div class="row tab-pane fade p-0" id="pills-slot-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    if($game['type'] == 'Slot')
                    {
                        ?>
                        <div class="col-lg-2 col-sm-4 col-xs-4 d-block card card_overlay p-1 mobile_grid">
                            <!-- <div class="card m-1 card_overlay"> -->
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false" class="hidden-xs">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
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
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
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
            <div class="row tab-pane fade p-0" id="pills-table-games">
                <?php
                foreach($all_games as $index => $game)
                {
                    if($game['type'] == 'Bingo')
                    {
                        ?>
                        <div class="col-lg-2 col-sm-4 col-xs-4 d-block p-1 card m-1 card_overlay mobile_grid">
                            <!-- <div class="card m-1 card_overlay"> -->
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a data-toggle="modal" data-target=".bd-game-modal-xl"   data-backdrop="static" data-keyboard="false" class="hidden-xs">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
                                        <div class="text" onclick="openIframe('<?=$game['url']?>')"> Play</div>
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
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="#">
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
    }
</script>

<script>
    function myFunction() { 
    let input = document.getElementById('myInput').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('card_overlay'); 
      
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="block";         
        } 
    } 
} 
</script>