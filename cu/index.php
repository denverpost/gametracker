<?php
require('../header.php');
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
                    echo display_photos($config[0]['photos']);
                    echo display_videos($config[0]['videos']);
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