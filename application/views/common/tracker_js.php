<!--Tracking Code-->
<script type="text/javascript">
    /*var campaign_set = 0;
    function set_cookie(cname, cvalue, exdays){
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function get_cookie(cname){
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++){
            var c = ca[i];
            while (c.charAt(0) == ' '){
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0){
                if(cname == 'cid'){
                    campaign_set = 1;
                }
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var campaign_id = get_cookie('cid');

    if(!campaign_id){
        //var all_campaigns = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        //campaign_id = all_campaigns[Math.floor(Math.random() * all_campaigns.length)];
        var parameter = window.location.search.substr(1);
        parameter = parameter.split("=");
        campaign_id = parameter[1];
        if(campaign_id !== undefined){
            set_cookie('cid', campaign_id, 1);
        }
    }*/

    <?php
    switch($current_page)
    {
        case 'player-profile':
            if($fire_trigger && $stored_vars)
            {
                $get_params = '';
                foreach($stored_vars as $key => $value)
                {
                    switch($key)
                    {
                        case 'jvc':
                            $get_params .= 'aid=' . $value . '&';
                            break;
                        case 'jvcr':
                            $get_params .= 'cid=' . $value . '&';
                            break;
                        default:
                            $get_params .= $key . '=' . $value . '&';
                            break;
                    }
                }
                ?>
                var page="REGISTER";
                var addScript = document.createElement("script");
                addScript.type = "text/javascript";
                addScript.src = "<?=AFFILIATE_URL?>/tracking?<?=$get_params?>page=" + page + "&pid=<?=$player_detail['id']?>&currency=<?=$player_detail['currency']?>";
                (document.getElementsByTagName("head")[0] || document.documentElement ).appendChild(addScript);
                <?php
            }
            break;
        case 'deposit-success':
            if($stored_vars)
            {
                $get_params = '';
                foreach($stored_vars as $key => $value)
                {
                    switch($key)
                    {
                        case 'jvc':
                            $get_params .= 'aid=' . $value . '&';
                            break;
                        case 'jvcr':
                            $get_params .= 'cid=' . $value . '&';
                            break;
                        default:
                            $get_params .= $key . '=' . $value . '&';
                            break;
                    }
                }
                ?>
                var page="DEPOSIT";
                var addScript = document.createElement("script");
                addScript.type = "text/javascript";
                addScript.src = "<?=AFFILIATE_URL?>/tracking?<?=$get_params?>page=" + page + "&pid=<?=$player_id?>&txid=<?=$transaction_id?>&amount=<?=$amount?>&currency=<?=$currency?>";
                (document.getElementsByTagName("head")[0] || document.documentElement ).appendChild(addScript);
                <?php
            }
            break;
        case 'deposit-first-success':
            if($stored_vars)
            {
                $get_params = '';
                foreach($stored_vars as $key => $value)
                {
                    switch($key)
                    {
                        case 'jvc':
                            $get_params .= 'aid=' . $value . '&';
                            break;
                        case 'jvcr':
                            $get_params .= 'cid=' . $value . '&';
                            break;
                        default:
                            $get_params .= $key . '=' . $value . '&';
                            break;
                    }
                }
                ?>
                var page="FIRST_DEPOSIT";
                var addScript = document.createElement("script");
                addScript.type = "text/javascript";
                addScript.src = "<?=AFFILIATE_URL?>/tracking?<?=$get_params?>page=" + page + "&pid=<?=$player_id?>&txid=<?=$transaction_id?>&amount=<?=$amount?>&currency=<?=$currency?>";
                (document.getElementsByTagName("head")[0] || document.documentElement ).appendChild(addScript);
                <?php
            }
            break;
        default:
            if($affiliate_vars)
            {
                $get_params = '';
                foreach($affiliate_vars as $key => $value)
                {
                    switch($key)
                    {
                        case 'jvc':
                            $get_params .= 'aid=' . $value . '&';
                            break;
                        case 'jvcr':
                            $get_params .= 'cid=' . $value . '&';
                            break;
                        default:
                            $get_params .= $key . '=' . $value . '&';
                            break;
                    }
                }
                ?>
                var page="LENDING";
                var addScript = document.createElement("script");
                addScript.type = "text/javascript";
                addScript.src = "<?=AFFILIATE_URL?>/tracking?<?=$get_params?>page=" + page;
                (document.getElementsByTagName("head")[0] || document.documentElement ).appendChild(addScript);
                <?php
            }
            break;
    }
    ?>
</script>
