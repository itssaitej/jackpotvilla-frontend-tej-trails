<!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!--H1>Click anywhere or press any key to play game in fullscreen.</H1-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <iframe id="main_frame" style="width: 100vw;height: 100vh;position: relative;" src="<?=$src?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <script type="text/javascript">
            var elem = document.getElementById("main_frame");
            function goFullscreen()
            {
                if (elem.requestFullscreen)
                {
                    elem.requestFullscreen();
                }
                else if (elem.mozRequestFullScreen)
                { /* Firefox */
                    elem.mozRequestFullScreen();
                }
                else if (elem.webkitRequestFullscreen)
                { /* Chrome, Safari and Opera */
                    elem.webkitRequestFullscreen();
                }
                else if (elem.msRequestFullscreen)
                { /* IE/Edge */
                    elem.msRequestFullscreen();
                }
                elem.style.display="";
            }
            /*document.documentElement.onclick = goFullscreen;
            document.onkeydown = goFullscreen;*/
        </script>
    </body>
</html>
