<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/27/14
 * Time: 1:38 PM
 */

include "inc/arrays.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php $appName = "Trejuice"; $pageTitle = "Welcome"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5C6BC0">
    <link rel="icon" href="img/favicon16.png" sizes="16x16">
    <link rel="icon" href="img/favicon32.png" sizes="32x32">
    <link rel="icon" href="img/favicon48.png" sizes="48x48">
    <link rel="icon" href="img/favicon64.png" sizes="64x64">
    <link rel="icon" href="img/favicon128.png" sizes="128x128">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ripples.min.css">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/material-wfont.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500italic,900,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/welcome.css">
    <title><?php echo $appName . " > " . $pageTitle;?></title>
</head>
<body>
<section class="full-screen">
    <div>
        <a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=08ZULxal8-A', containment:'body', showControls:false, quality:'large', autoPlay:true, loop:true, mute:true, optimizeDisplay:true, opacity:1, vol:100}"></a>
        <div class="row centered-header">
            <div class="col-lg-12">
                <h1 class="text-shadow text-header">Trejuice Films</h1>
                <h3 class="text-shadow text-subheader">Filming, Photography and more...</h3>
            </div>
        </div>
        <div class="row row-centered row-padded">
            <div class="col-lg-6 col-md-6 col-sm-6 col-border-right">
                <h2 class="text-center text-section-heading">Stay Tuned</h2>
                <hr class="separator">
                <p class="paragraph text-shadow">This site is being constructed from the ground up and may take awhile until its ready to shred. In the meantime, follow the social feeds for updated content.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2 class="text-center text-section-heading">Follow</h2>
                <hr class="separator">
                <?php
                foreach (get_footer_social_icons() as $item) {?>
                    <div class="col-lg-3 col-md-3 col-social col-centered">
                        <a href="<?php echo $item['href'] ?>" target="_blank">
                            <img src="<?php echo $item['img'] ?>" alt="<?php echo $item['text'] ?>" class="social-icon">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row row-centered row-padded">
            <div class="col-lg-5 col-centered">
                <div class="col-lg-6 col-centered">
                    <h4 class="text-center">Media by <strong>Trevor Atkinson</strong></h4>
                </div>
                <div class="col-lg-6 col-centered">
                    <h4 class="text-center">Site by <strong>Jaison Brooks</strong></h4>
                </div>
            </div>
        </div>

<!--                <div class="embed-responsive embed-responsive-16by9">-->
<!--                    <iframe class="trans-div" src="//player.vimeo.com/video/115400775"></iframe>-->
<!--<!--                    <iframe class="embed-responsive-item trans-div" src="//www.youtube.com/embed/nILFjOyXBAc?rel=0"></iframe>-->
<!--                </div>-->
<!--            </div>-->
<!--                <div class="embed-responsive embed-responsive-16by9">-->
<!--                    <img class="img-responsive trans-div" src="img/photo_boise.jpg">-->
<!--                </div>-->
<!--<!--                <div class="embed-responsive embed-responsive-16by9">-->
<!--<!--                    <iframe class="trans-div" src="//player.vimeo.com/video/74133704"></iframe>-->
<!--<!--                </div>-->
            <p class="text-right video-controls">
                <i class="mdi-av-pause mdi-lg" id="video-playback"></i><i class="mdi-av-volume-up mdi-lg" id="video-audio"></i></p>
    </div>
</section>

<?php include("inc/js_scripts.php") ?>
<script src="js/jquery.mb.YTPlayer.min.js"></script>
<script>
    $(document).ready(function () {
        $(".player").mb_YTPlayer();
    });
    $('#video-playback').click(function() {
        if ($(this).hasClass('mdi-av-play-arrow')) {
            $(this).removeClass('mdi-av-play-arrow').addClass('mdi-av-pause');
            $(".player").playYTP();
        } else {
            $(this).removeClass('mdi-av-pause').addClass('mdi-av-play-arrow');
            $(".player").pauseYTP();
        }
    });
    $('#video-audio').click(function() {
       if ($(this).hasClass('mdi-av-volume-mute')) {
           $(this).removeClass('mdi-av-volume-mute').addClass('mdi-av-volume-up');
           $(".player").muteYTPVolume();
       }  else {
           $(this).removeClass('mdi-av-volume-up').addClass('mdi-av-volume-mute');
           $(".player").unmuteYTPVolume();
       }
    });
</script>
<!-- Kill the HTML below -->
</body>
</html>