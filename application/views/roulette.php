<div class="wrapper">
<?php $this->load->view('common/side-menu') ?>
    <div id="content" class="w-100">
    <?php $this->load->view('common/menu') ?>
    <div class="row mx-2 my-1">
    <?php
                foreach($all_games as $index => $game)
                {
                    if($game['type'] == 'Roulette')
                    {
                        ?>
                        <div class="col-lg-2 col-sm-2 col-xs-6 d-block p-0">
                            <div class="card m-1 card_overlay">
                                <?php
                                if($this->session->userdata('token'))
                                {
                                    ?>
                                    <a href="<?=$game['url']?>" target="_blank">
                                        <?=$game['featured']? '<span class="badge badge-secondary d-block">Featured</span>' : ''?>
                                        <img src="<?=API_URL . $game['logo']?>" class="card-img-top image lazy" alt="<?=$game['display_name']?>">
                                        <div class="middle">
                                        <a href="<?=$game['url']?>" target="_blank">
                                        <div class="text"> Play</div>
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
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
    
    </div>
</div>
</div>
