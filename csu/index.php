<?php
include('../header.php');
?>

<div id="topper">
    
    <img src="../denverpost-twitter-template-large.png" class="dplogo" />
    
    <div id="away">
        <span id="awayscore"></span>
    </div>

    <div id="scores">
        <div class="teams"><h2><?php echo $config[0]['friendlyname'] ?> Gametracker</h2></div>
        <div class="gamedata"><span id="quarter"></span> <span id="bullet"></span> <time id="remaining"></time></div>
        <div class="gamedata"><span id="awayposs" class="possessors">&#x25c4;</span><span id="down"><span id="countdownform"></span></span><span id="homeposs" class="possessors">&#x25ba;</span></div>
    </div>
    
    <div id="home">
        <span id="homescore"></span>
    </div>

</div>

<?php include('../addiv.php'); ?>

<div id="slider" class="swipe">
    <div class="swipe-wrap" id="slidehi">
        <div id="swipe1" class="slide">
            <iframe src="<?php echo $config[0]['scribble']; ?>" width="100%" height="2000" frameborder="0"></iframe>
        </div>
        <div id="swipe2" class="slide">
            <div class="gallerywrap">
                <iframe src="<?php echo $config[0]['boxscore']; ?>" style="height:7000px;width:100%;background:#fff;" frameborder="no"></iframe>
            </div>
        </div>
        <div id="swipe3" class="slide">
            <div id="ajaxheadlines">
                <script type="text/javascript" src="http://extras.denverpost.com/cache/gametracker-<?php echo strtolower($config[0]['friendlyname']); ?>.js"></script>
            </div>
            <div id="headlinesrefresh">
                <img src="../button-refresh.png" alt="Tap to refresh headlines" />
            </div>
        </div>
        <div id="swipe4" class="slide">
            <div class="gallerywrap">
                <?php
                    if ( strpos($config[0]['photos'],'photos.denverpost.com') !== false) {
                        $photosout = sprintf('<div class="gallerychunk"><div id="mc-embed-container"></div> <div class="clear" style="margin-bottom:10px;"></div> <script> $(document).ready(function(){ setTimeout(function(){ mc_embed_gallery = new MCGallery({ url : \'%1$s\',captionHeight : \'85px\', parentContainer: \'mc-embed-container\' }); }, 1000); }); </script> </div>',
                            $config[0]['photos']
                        );
                    }
                    echo $photosout;
                    $output = '';
                    $videos = $config[0]['videos'];
                    for($i=0;$i <= count($videos);$i++) {
                        if (strlen(trim($videos[$i])) == 13) {
                            $output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="videoEmbed%3$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("videoEmbed%3$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><div style="display:none"></div><script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script><object id="myExperience%1$s" class="BrightcoveExperience"><param name="bgcolor" value="#FFFFFF" /><param name="width" value="100%%" /><param name="height" value="100%%" /><param name="playerID" value="747347108001" /><param name="playerKey" value="AQ~~,AAAAADe65VU~,G496cZ36A_WJiqq5Paft4yTJ0a5PQX2r" /><param name="isVid" value="true" /><param name="isUI" value="true" /><param name="dynamicStreaming" value="true" /><param name="@videoPlayer" value="%2$s" /></object><script type="text/javascript">brightcove.createExperiences();</script></div><div class="clear"></div></div></div>',
                                $videos[$i],
                                $videos[$i],
                                $i
                            );
                        } else if (strlen(trim($videos[$i])) == 32) {
                            $output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="ooEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("ooEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><script height="100%%" width="100%%" src="http://player.ooyala.com/iframe.js#pbid=fce2cf476df14253a15351f1727031b4&ec=%1$s"></script></div><div class="clear"></div></div></div>',
                                $videos[$i],
                                $i
                            );
                        }
                    }
                    echo $output;
                ?>
            </div>
        </div>
        <div id="swipe5" class="slide">
            <?php require('../comments.php'); ?>
        </div>
    </div>
</div>

<?php
require('../footer.php');
?>