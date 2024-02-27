<script type="text/javascript">
    $('#gameModal').on('hide.bs.modal', function () {
        // $(this).find("src, iframe").val('', '').end();
        var iframe  = document.getElementById("forPostyouradd");
        iframe.setAttribute('src', '');
        iframe.style.display = 'block';
    });

    /*$(".menu_flex li").on('click', function(){
        //$("li").addClass(".nav-link.active")
    });*/

    var game_provider_tabs = [
        'pills-solutions',
        'pills-diceandreel',
        'pills-netent',
        'pills-tomhorn',
        'pills-pragmatic',
        'pills-spinomenal',
        'pills-vivo',
        'pills-yggdrasil',
        'pills-novomatic',
        //'pills-playtech',
        'pills-fugaso',
        'pills-egt',
        'pills-amatic',
        'pills-aristocrat',
        'pills-bgaming',
        'pills-hacksaw',
        'pills-justplay',
        //'pills-merkurgame',
        'pills-playson',
        'pills-evoplay',
        'pills-gamshy',
        'pills-felix',
        'pills-booongo',
        //'pills-belatra',
        'pills-kingplay'
    ];

    var game_provider_html = {
        'pills-solutions': 'Solutions',
        'pills-diceandreel': 'DiceandReel',
        'pills-netent': 'Netent',
        'pills-tomhorn': 'TomHorn',
        'pills-pragmatic': 'PragmaticPlay',
        'pills-spinomenal': 'Spinomenal',
        'pills-vivo': 'Vivo-Betsoft',
        'pills-yggdrasil': 'Yggdrasil',
        'pills-novomatic': 'Novomatic',
        //'pills-playtech': 'Playtech',
        'pills-fugaso': 'Fugaso',
        'pills-egt': 'EGT',
        'pills-amatic': 'Amatic',
        'pills-aristocrat': 'Aristocrat',
        'pills-bgaming': 'BGaming',
        'pills-hacksaw': 'Hacksaw',
        'pills-justplay': 'Justplay',
        //'pills-merkurgame': 'Merkur',
        'pills-playson': 'Playson',
        'pills-evoplay': 'Evoplay',
        'pills-gamshy': 'Gamshy',
        'pills-felix': 'Felix',
        'pills-booongo': 'Booongo'
        //'pills-belatra': 'Belatra',
        //'pills-kingplay': 'KingPlay'
    };

    var current_tab = '<?=$current_tab?>';
    var skip_current_tabs = [
        'pills-promotions'
    ];

    if(!game_provider_tabs.indexOf(current_tab) != -1){
        $('#dropdown-toggle1').html(game_provider_html[current_tab]);
    }

    $('.dropdown-menu a').on('click', function(){
        $('.dropdown-toggle').html($(this).html());
        $('.nav-link').on('click', function(){
            $('.dropdown-toggle').html("GAME PROVIDERS");
        });
    });

    if(skip_current_tabs.indexOf(current_tab) == -1 && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        // .modal('hide')
        $('#gameModal').modal('hide')

        function openIframe(src){
            window.open('/game/mobile?src=' + encodeURIComponent(src));
        }

        $.ajax({
            type: 'GET',
            url: '/game/casino-mobile',
            success: function(data){
                data = JSON.parse(data);
                var providers = data.providers;
                var all_games = data.all_games;
                var html = '';
                var provider_html = '';
                var nav_class = '';
                var provider_count = 0;
                for(var provider_name in all_games){
                    if(providers.indexOf(provider_name) !== -1){
                        var display_provider_name = provider_name;
                        if(display_provider_name == 'Solutions')
                        {
                            display_provider_name = 'Zeppelin';
                        }
                        nav_class = '';
                        /*if(provider_count == 0){
                            nav_class = 'active';
                        }*/
                        provider_html += '<a class="dropdown-item" id="pills-' + provider_name.replace(' ', '').toLowerCase() + '-tab" data-toggle="pill" href="#pills-' + provider_name.replace(' ', '').toLowerCase() + '" role="tab">' + display_provider_name + '</a>';
                        provider_count++;
                    }
                }

                document.getElementById("casino-nav-provider").innerHTML = provider_html;
                provider_count = 0;
                for(var provider_name in all_games){
                    nav_class = '';
                    if(provider_count == 0){
                        nav_class = 'active';
                    }
                    if(provider_name == 'Live Games'){
                        html += '<div class="row tab-pane fade p-2 live_games" id="pills-' + provider_name.replace(' ', '').toLowerCase() + '">';
                        all_games[provider_name].forEach(function(value){
                            html += '<div class="col-lg-4 col-sm-6 col-xs-12 mt-4 live_games_grid"><div class="live_grid_container m-1 p-0"><div class="game_container text-white"><div class="card-header text-center py-1"><div class="row w-100 text-center d-flex m-auto" style="margin: auto !important; align-items: center;justify-content: center;">';
                            if(value.type.indexOf('Roulette') !== -1){
                                html += '<img src="/assets/images/roulette.png"  height="40" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/table_games.png" height="40" alt="">';
                            }
                            html += '&nbsp;<span><h5>' + value.display_name + '</h5></span></div></div>';
                            html += '<div class="overlay d-block mx-auto">';
                            if(value.type.indexOf('Roulette') !== -1){
                                html += '<div class="overlay_icons overlay_roulette text-center mx-auto" id="game-' + value.reference_code + '"><span class="overlay_header">Recent Numbers</span>';
                                var final_index = 0;
                                value.result.forEach(function(game_result, index){
                                    final_index = index;
                                    //console.log(index, game_result);
                                    if(index % 2 == 0){
                                        html += '<div class="row m-0 p-0 my-1 w-50">';
                                    }
                                    html += '<div class="col-6  m-0 p-0">';
                                    if(data.black_numbers.indexOf(game_result) !== -1){
                                        html += '<div class="black">' + game_result + '</div>';
                                    }
                                    else if(data.red_numbers.indexOf(game_result) !== -1){
                                        html += '<div class="red">' + game_result + '</div>';
                                    }
                                    else{
                                        html += '<div class="green">' + game_result + '</div>';
                                    }
                                    html += '</div>';
                                    if(index % 2 != 0){
                                        html += '</div>';
                                    }
                                });
                                if(final_index % 2 == 0){
                                    html += '</div>';
                                }
                                html += '</div>';
                            }
                            else{
                                html += '<div class="overlay_icons seats_avail text-center mx-auto" id="game-' + value.reference_code + '">';
                                if(!value.noof_seats || value.noof_seats == value.occupied_seats){
                                    html += '<span class="overlay_header ">No Seat Available</span>'
                                        + '<div class="row m-0 p-0 my-1 w-75">'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">1</span></div>'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">2</span></div>'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">3</span></div>'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">4</span></div>'
                                        + '</div>'
                                        + '<div class="row m-0 p-0 my-1 w-100">'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">5</span></div>'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">6</span></div>'
                                        + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">7</span></div>'
                                        + '</div>';
                                }
                                else{
                                    html += '<span class="overlay_header ">Seats Available</span>'
                                        + '<div class="row m-0 p-0 my-1 w-75">';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(0) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">1</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(1) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">2</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(2) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">3</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(3) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">4</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(4) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">5</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(5) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">6</span></div>';
                                    html += '<div class="col-3 mb-1 p-0">';
                                    if(value.occupied_seat_ids.indexOf(6) !== -1){
                                        html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                                    }
                                    else{
                                        html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                                    }
                                    html += '<span class="seat_num">7</span></div>';
                                    html += '</div>';
                                }
                                html += '</div>';
                            }
                            html += '</div>';
                            html += '<div class="name_container">' + value.dealer_name + '</div>';
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                html += '<img src="' + value.logo + '" class="card-img-top image lazy" alt="' + value.display_name + '">';
                                <?php
                            }
                            else
                            {
                                ?>
                                html += '<img src="' + value.logo + '" class="card-img-top image lazy" alt="' + value.display_name + '"><div class="middle"><a href="#"><div class="text"> Login</div></a></div>';
                                <?php
                            }
                            ?>
                            html += '</div></div></div>';
                        });
                        html += '</div>';
                    }
                    else{
                        html += '<div class="row tab-pane fade show ' + nav_class + ' p-0" id="pills-' + provider_name.replace(' ', '').toLowerCase() + '">';
                        all_games[provider_name].forEach(function(value){
                            html += '<div class="col-auto d-block card card_overlay p-0 mobile_grid">';
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image lazy" alt="' + value.display_name + '">'
                                    +'<div class="middle">'
                                    +'<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">'
                                    +'<div class="text" onclick="openIframe(\'' + value.url + '\')"> <img src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div></a></div></a>';
                                <?php
                            }
                            else
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target="#loginModal">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image" alt="' + value.display_name + '">'
                                    +'<div class="middle">'
                                    +'<a href="#">'
                                    +'<div class="text"> Login</div></a></div></a>';
                                <?php
                            }
                            ?>
                            html += '</div>';
                        });
                        html += '</div>';
                    }
                    provider_count++;
                }

                document.getElementById("pills-all-games").innerHTML = html;
            }
        });
    }

    <?php
    if($this->session->userdata('token'))
    {
        ?>
        setInterval(function() {
            get_live_games();
        }, 60000);
        <?php
    }
    ?>

    function get_live_games(){
        $.ajax({
            type: 'GET',
            url: '/game/live?ajax=true',
            success: function(data){
                data = JSON.parse(data);
                data.all_games.forEach(function(game){
                    var game_id = 'game-' + game.reference_code;
                    if(game.type.indexOf("Roulette") !== -1){
                        //console.log(game, game.result);
                        var html = '<span class="overlay_header">Recent Numbers</span>';
                        var final_index = 0;
                        game.result.forEach(function(game_result, index){
                            final_index = index;
                            //console.log(index, game_result);
                            if(index % 2 == 0){
                                html += '<div class="row m-0 p-0 my-1 w-50">';
                            }
                            html += '<div class="col-6  m-0 p-0">';
                            if(data.black_numbers.indexOf(game_result) !== -1){
                                html += '<div class="black">' + game_result + '</div>';
                            }
                            else if(data.red_numbers.indexOf(game_result) !== -1){
                                html += '<div class="red">' + game_result + '</div>';
                            }
                            else{
                                html += '<div class="green">' + game_result + '</div>';
                            }
                            html += '</div>';
                            if(index % 2 != 0){
                                html += '</div>';
                            }
                        });
                        if(final_index % 2 == 0){
                            html += '</div>';
                        }
                    }
                    else{
                        if(!game.noof_seats || game.noof_seats == game.occupied_seats){
                            var html = '<span class="overlay_header ">No Seat Available</span>'
                                + '<div class="row m-0 p-0 my-1 w-75">'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">1</span></div>'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">2</span></div>'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">3</span></div>'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">4</span></div>'
                                + '</div>'
                                + '<div class="row m-0 p-0 my-1 w-100">'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">5</span></div>'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">6</span></div>'
                                + '<div class="col-3 m-0 p-0"><img src="/assets/images/seat_black.svg" height="24" alt=""><span class="seat_num">7</span></div>'
                                + '</div>';
                        }
                        else{
                            var html = '<span class="overlay_header ">Seats Available</span>'
                                + '<div class="row m-0 p-0 my-1 w-75">';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(0) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">1</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(1) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">2</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(2) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">3</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(3) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">4</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(4) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">5</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(5) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">6</span></div>';
                            html += '<div class="col-3 mb-1 p-0">';
                            if(game.occupied_seat_ids.indexOf(6) !== -1){
                                html += '<img src="/assets/images/seat_black.svg" height="24" alt="">';
                            }
                            else{
                                html += '<img src="/assets/images/seat_white.svg" height="24" alt="">';
                            }
                            html += '<span class="seat_num">7</span></div>';
                        }
                    }
                    document.getElementById(game_id).innerHTML = html;
                });
            }
        });
    }

    $('#gameSearch').keypress(function (e) {
        var key = e.which;
        if(key == 13){
            console.log("I am here");
            document.getElementById("loading").style.display = 'block';
            document.getElementById("searchBox").style.display = 'none';
            showResult();

            /*setTimeout(function(){
                document.getElementById("loading").style.display = 'block';
                document.getElementById("searchBox").style.display = 'none'
            },4000) */
        }
    });

    $('#gameSearchMobile').keypress(function (e) {
        var key = e.which;
        if(key == 13){
            document.getElementById("loadingMobile").style.display = 'block';
            document.getElementById("searchBoxMobile").style.display = 'none';
            showMobileResult();

            /*setTimeout(function(){
                document.getElementById("loadingMobile").style.display = 'block';
                document.getElementById("searchBoxMobile").style.display = 'none'
            },4000)*/
        }
    });

    // function highlightSearchMobile(){
    //     const searchChar = document.getElementById("gameSearchMobile");
    //     searchChar.addEventListener("keyup", ({key}) => {
    // if (key === "Enter") {
    //     document.getElementById("loadingMobile").style.display = 'block'

    //     setTimeout(function(){
    //         document.getElementById("loadingMobile").style.display = 'block'
    // },4000)
    // }
    // })
    // }

    function showResult(){
        let search_string = document.getElementById("gameSearch").value;
        if(search_string.length > 2){
            $.ajax({
                type: 'GET',
                url: '/game/search/' + search_string,
                success: function(data){
                    if(data.length){
                        data = JSON.parse(data);
                        console.log('Data------------', data);
                        let searched_games = data;
                        let searched_tab = '<?=$current_tab?>';
                        let html = '';
                        searched_games.forEach(function(value){
                            html += '<div class="col-auto d-block card card_overlay p-0 mobile_grid">';
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image lazy" alt="' + value.display_name + '">'
                                    +'<div class="middle" onclick="openIframe(\'' + value.url + '\')">'
                                    +'<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">'
                                    +'<div class="text"> <img src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div></a></div></a>';
                                <?php
                            }
                            else
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target="#loginModal">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image" alt="' + value.display_name + '">'
                                    +'<div class="middle">'
                                    +'<a href="#">'
                                    +'<div class="text"> Login</div></a></div></a>';
                                <?php
                            }
                            ?>
                            html += '</div>';
                        });
                        document.getElementById(searched_tab).innerHTML = html;

                        document.getElementById("loading").style.display = 'none';
                        document.getElementById("searchBox").style.display = 'flex'
                    }
                }
            });
        }
    }

    function showMobileResult(){
        let search_string = document.getElementById("gameSearchMobile").value;
        if(search_string.length > 2){
            $.ajax({
                type: 'GET',
                url: '/game/search-mobile/' + current_mobile_tab + '/' + search_string,
                success: function(data){
                    if(data.length){
                        data = JSON.parse(data);
                        let searched_games = data;
                        let searched_tab = '<?=$current_tab?>';
                        let html = '';
                        searched_games.forEach(function(value){
                            html += '<div class="col-auto d-block card card_overlay p-0 mobile_grid">';
                            <?php
                            if($this->session->userdata('token'))
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image lazy" alt="' + value.display_name + '">'
                                    +'<div class="middle" onclick="openIframe(\'' + value.url + '\')">'
                                    +'<a data-toggle="modal" data-target=".bd-game-modal-xl"  data-backdrop="static" data-keyboard="false">'
                                    +'<div class="text"> <img src="assets/images/GameGrid/PlayIcon_black.png" height="75" alt=""></div></a></div></a>';
                                <?php
                            }
                            else
                            {
                                ?>
                                html += '<a data-toggle="modal" data-target="#loginModal">';
                                if(parseInt(value.featured)){
                                    html += '<span class="badge badge-secondary d-block">Featured</span>';
                                }
                                html += '<img src="<?=API_URL?>' + value.logo + '" class="card-img-top image" alt="' + value.display_name + '">'
                                    +'<div class="middle">'
                                    +'<a href="#">'
                                    +'<div class="text"> Login</div></a></div></a>';
                                <?php
                            }
                            ?>
                            html += '</div>';
                        });
                        document.getElementById('pills-' + current_mobile_tab).innerHTML = html;

                        document.getElementById("loadingMobile").style.display = 'none';
                        document.getElementById("searchBoxMobile").style.display = 'flex'
                    }
                }
            });
        }
    }

    var current_mobile_tab = 'featured';

    function set_current_tab(tab){
        current_mobile_tab = tab;
    }
</script>
