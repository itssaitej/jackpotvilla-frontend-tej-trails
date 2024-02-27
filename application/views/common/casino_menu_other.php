<nav class="navbar sticky-top sticky_top navbar-expand-sm navbar-dark w-100 py-2 px-0 m-0 desktop_nav">
    <div class="container">
        <ul class="list-group list-group-horizontal-md menu_flex w-100 nav nav-pills" style="list-style-type: none;">
            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-featured' ? 'active' : ''?>" id="pills-featured-tab" href="/?t=featured" role="tab">
                    <img src="/assets/images/menuicons/Featured.png" height="50" alt="">
                    <p><?=lang('game_menu_featured')?></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-newgames' ? 'active' : ''?>" id="pills-newgames-tab"  href="/?t=newgames" role="tab">
                    <img src="/assets/images/menuicons/NewGames.png" height="50" alt="">
                    <p><?=lang('game_menu_new_games')?></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-videoslots' ? 'active' : ''?>" id="pills-videoslots-tab"  href="/?t=videoslots" role="tab">
                    <img src="/assets/images/menuicons/VideoSlots.png" height="50" alt="">
                    <p><?=lang('game_menu_video_slots')?></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-tablegames' ? 'active' : ''?>" id="pills-tablegames-tab"  href="/?t=tablegames" role="tab">
                    <img src="/assets/images/menuicons/TableGames.png" height="50" alt="">
                    <p><?=lang('game_menu_table_games')?></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-livegames' ? 'active' : ''?>" id="pills-livegames-tab"  href="/?t=livegames" role="tab">
                    <img src="/assets/images/menuicons/LiveGames.png" height="50" alt="">
                    <p><?=lang('game_menu_live_games')?></p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?=isset($current_tab) && $current_tab == 'pills-allgames' ? 'active' : ''?>" id="pills-allgames-tab"  href="/?t=allgames" role="tab">
                    <img src="/assets/images/menuicons/AllGames.png" height="50" alt="">
                    <p><?=lang('game_menu_all_games')?></p>
                </a>
            </li>

            <li class="nav-item dropdown mx-4">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Game Providers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-diceandreel' ? 'active' : ''?>" id="pills-diceandreel-tab"  href="/?t=diceandreel" role="tab">
                        DiceandReel
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-netent' ? 'active' : ''?>" id="pills-netent-tab"  href="/?t=netent" role="tab">
                        Netent
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-tomhorn' ? 'active' : ''?>" id="pills-tomhorn-tab"  href="/?t=tomhorn" role="tab">
                        TomHorn
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-pragmatic' ? 'active' : ''?>" id="pills-pragmatic-tab"  href="/?t=pragmatic" role="tab">
                        PragmaticPlay
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-spinomenal' ? 'active' : ''?>" id="pills-spinomenal-tab"  href="/?t=spinomenal" role="tab">
                        Spinomenal
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-vivo' ? 'active' : ''?>" id="pills-vivo-tab"  href="/?t=vivo" role="tab">
                        Vivo-Betsoft
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-yggdrasil' ? 'active' : ''?>" id="pills-yggdrasil-tab"  href="/?t=yggdrasil" role="tab">
                        Yggdrasil
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-novomatic' ? 'active' : ''?>" id="pills-novomatic-tab"  href="/?t=novomatic" role="tab">
                        Novomatic
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-playtech' ? 'active' : ''?>" id="pills-playtech-tab"  href="/?t=playtech" role="tab">
                        Playtech
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-fugaso' ? 'active' : ''?>" id="pills-fugaso-tab"  href="/?t=fugaso" role="tab">
                        Fugaso
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-egt' ? 'active' : ''?>" id="pills-egt-tab"  href="/?t=egt" role="tab">
                        EGT
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-amatic' ? 'active' : ''?>" id="pills-amatic-tab"  href="/?t=amatic" role="tab">
                        Amatic
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-aristocrat' ? 'active' : ''?>" id="pills-aristocrat-tab"  href="/?t=aristocrat" role="tab">
                        Aristocrat
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-bgaming' ? 'active' : ''?>" id="pills-bgaming-tab"  href="/?t=bgaming" role="tab">
                        BGaming
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-hacksaw' ? 'active' : ''?>" id="pills-hacksaw-tab"  href="/?t=hacksaw" role="tab">
                        Hacksaw
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-justplay' ? 'active' : ''?>" id="pills-justplay-tab"  href="/?t=justplay" role="tab">
                        Justplay
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-merkurgame' ? 'active' : ''?>" id="pills-merkurgame-tab"  href="/?t=merkurgame" role="tab">
                        Merkur
                    </a>
                    <a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-belatra' ? 'active' : ''?>" id="pills-belatra-tab"  href="/?t=belatra" role="tab">
                        Belatra
                    </a>
                    <!--a class="dropdown-item <?=isset($current_tab) && $current_tab == 'pills-kingsplay' ? 'active' : ''?>" id="pills-kingsplay-tab"  href="/?t=kingsplay" role="tab">
                        KingPlay
                    </a-->
                </div>
            </li>
            <li>
                <form class="form-inline">
                    <div class="input-group" style="border: 0.25px solid #0000cc; border-radius: 25px;">
                        <input type="text" class="form-control mr-0" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" id="gameSearch" style="background: transparent; border:0;box-shadow: none;">
                        <div class="input-group-prepend bg-transparent" style="border:0" onclick="showResult()">
                            <span class="input-group-text" id="basic-addon1" style="background: transparent; border:0">
                                <img src="/assets/images/icons/search_blue.svg" height="20" alt="">
                            </span>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</nav>

<ul class="nav sticky-top sticky_top navbar-expand-sm bg-light w-100 py-2 px-0 m-0 mobile_nav">
    <div class="container">
        <ul class="list-group list-group-horizontal-md menu_flex w-100 nav nav-pills" style="list-style-type: none;">
            <li class="nav-item">
                <a class="nav-link active" id="pills-featured-tab" data-toggle="pill" href="#pills-featured" role="tab">
                    <img src="/assets/images/menuicons/Featured.png" height="50" alt="">
                    <p>Featured</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-newgames-tab" data-toggle="pill" href="#pills-newgames" role="tab">
                    <img src="/assets/images/menuicons/NewGames.png" height="50" alt="">
                    <p>New Games</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-videoslots-tab" data-toggle="pill" href="#pills-videoslots" role="tab">
                    <img src="/assets/images/menuicons/VideoSlots.png" height="50" alt="">
                    <p>Video Slots</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-tablegames-tab" data-toggle="pill" href="#pills-tablegames" role="tab">
                    <img src="/assets/images/menuicons/TableGames.png" height="50" alt="">
                    <p>Table Games</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-livegames-tab" data-toggle="pill" href="#pills-livegames" role="tab">
                    <img src="/assets/images/menuicons/LiveGames.png" height="50" alt="">
                    <p>Live Games</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="pills-allgames-tab" data-toggle="pill" href="#pills-allgames" role="tab">
                    <img src="/assets/images/menuicons/AllGames.png" height="50" alt="">
                    <p>All Games</p>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Game Providers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="casino-nav-provider">
                    <a class="dropdown-item" id="pills-diceandreel-tab" data-toggle="pill" href="#pills-diceandreel" role="tab">
                        DiceandReel
                    </a>
                    <a class="dropdown-item" id="pills-netent-tab" data-toggle="pill" href="#pills-netent" role="tab">
                        Netent
                    </a>
                    <a class="dropdown-item" id="pills-tomhorn-tab" data-toggle="pill" href="#pills-tomhorn" role="tab">
                        TomHorn
                    </a>
                    <a class="dropdown-item" id="pills-pragmatic-tab" data-toggle="pill" href="#pills-pragmatic" role="tab">
                        PragmaticPlay
                    </a>
                    <a class="dropdown-item" id="pills-spinomenal-tab" data-toggle="pill" href="#pills-spinomenal" role="tab">
                        Spinomenal
                    </a>
                    <a class="dropdown-item" id="pills-vivo-tab" data-toggle="pill" href="#pills-vivo" role="tab">
                        Vivo-Betsoft
                    </a>
                    <a class="dropdown-item" id="pills-yggdrasil-tab" data-toggle="pill" href="#pills-yggdrasil" role="tab">
                        Yggdrasil
                    </a>
                    <a class="dropdown-item" id="pills-novomatic-tab" data-toggle="pill" href="#pills-novomatic" role="tab">
                        Novomatic
                    </a>
                    <a class="dropdown-item" id="pills-playtech-tab" data-toggle="pill" href="#pills-playtech" role="tab">
                        Playtech
                    </a>
                    <a class="dropdown-item" id="pills-fugaso-tab" data-toggle="pill" href="#pills-fugaso" role="tab">
                        Fugaso
                    </a>
                    <a class="dropdown-item" id="pills-egt-tab" data-toggle="pill" href="#pills-egt" role="tab">
                        EGT
                    </a>
                    <a class="dropdown-item" id="pills-amatic-tab" data-toggle="pill" href="#pills-amatic" role="tab">
                        Amatic
                    </a>
                    <a class="dropdown-item" id="pills-aristocrat-tab" data-toggle="pill" href="#pills-aristocrat" role="tab">
                        Aristocrat
                    </a>
                    <a class="dropdown-item" id="pills-bgaming-tab" data-toggle="pill" href="#pills-bgaming" role="tab">
                        BGaming
                    </a>
                    <a class="dropdown-item" id="pills-belatra-tab" data-toggle="pill" href="#pills-belatra" role="tab">
                        Belatra
                    </a>
                </div>
            </li>
        </ul>
        <ul class=" justify-content-end">
            <form class="form-inline justify-content-end">
                <div class="input-group" style="border: 0.25px solid #0000cc; border-radius: 25px;">
                    <input type="text" class="form-control mr-0" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" id="gameSearchMobile" style="background: transparent; border:0; box-shadow: none">
                    <div class="input-group-prepend bg-transparent" style="border:0" onclick="showMobileResult()">
                        <span class="input-group-text" id="basic-addon1" style="background: transparent; border:0">
                            <img src="/assets/images/icons/search_blue.svg" height="20" alt="">
                        </span>
                    </div>
                </div>
            </form>
        </ul>
    </div>
</ul>


<div id="comm100-button-e36b229a-3900-4dca-84a1-0ec3470db95a"></div>

<script type="text/javascript">
var Comm100API=Comm100API||{};(function(t){function e(e){var a=document.createElement("script"),c=document.getElementsByTagName("script")[0];a.type="text/javascript",a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:"e36b229a-3900-4dca-84a1-0ec3470db95a",div_id:"comm100-button-e36b229a-3900-4dca-84a1-0ec3470db95a"}),t.site_id=10002005,t.main_code_plan="e36b229a-3900-4dca-84a1-0ec3470db95a",e("https://vue.comm100.com/livechat.ashx?siteId="),setTimeout(function(){t.loaded||e("https://standby.comm100vue.com/livechat.ashx?siteId=")},5e3)})(Comm100API||{})
</script>
