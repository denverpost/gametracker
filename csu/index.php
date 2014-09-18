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

<?php //include('../addiv.php'); ?>

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
                <script type="text/javascript" src="http://extras.denverpost.com/cache/gametracker-broncos.js"></script>
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
                ?>
            </div>
        </div>
        <div id="swipe5" class="slide">
            <div class="gallerywrap">
                <?php
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
    </div>
</div>

<div id="bottombuttons">
    <ul>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(0,200);switchShowingClass(this);"><img src="../button-live.png" />Live</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(1,200);switchShowingClass(this);"><img src="../button-stats.png" />Stats</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(2,200);switchShowingClass(this);"><img src="../button-news.png" />News</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(3,200);switchShowingClass(this);"><img src="../button-media.png" />Photos</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(4,200);switchShowingClass(this);"><img src="../button-video.png" />Video</a></li>
    </ul>
</div>

<script type="text/javascript">

    //Do the countdown until the game...
    var current="";
    var year=2014;
    var month=02;
    var day=02;
    var hour=16;
    var minute=30;
    var second=0;
    var tz=-7;
    var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    var thecountdown = '';

    function countdown(yr,m,d,hr,min,sec){
        theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;thesecond=sec;
        var today=new Date();
        var todayy=today.getYear();
        if (todayy < 1000) {
        todayy+=1900; }
        var todaym=today.getMonth();
        var todayd=today.getDate();
        var todayh=today.getHours();
        var todaymin=today.getMinutes();
        var todaysec=today.getSeconds();
        var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
        var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
        var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
        var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
        var dd=futurestring-todaystring;
        var dday=Math.floor(dd/(60*60*1000*24)*1);
        var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
        var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
        var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
        if(dday>0||dhour>0||dmin>0||dsec>0){
            thecountdown = dday + 'd, ' + dhour + 'h, ' + dmin + 'm, ' + dsec + 's to kickoff';
            thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
            thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
            thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
            document.getElementById('countdownform').innerHTML=thecountdown;
            setTimeout("countdown(theyear,themonth,theday,thehour,theminute,thesecond)",1000);
        }
    }
    countdown(year,month,day,hour,minute,second);

    $.event.special.swipe.horizontalDistanceThreshold = (screen.availWidth)/3;
    $.event.special.swipe.verticalDistanceThreshold = (screen.availWidth)/10;
    $.event.special.swipe.scrollSupressionThreshold = (screen.availWidth)/6;

    var body = document.getElementsByTagName('body')[0];
    var positions = [];
    var currentPage = 0;
    var offset = [];

    var cb = function(index, element) {
        positions[currentPage] = $(document).scrollTop();
        var scrollToHere = positions[index] || 0;
        $('html,body').animate({scrollTop: scrollToHere}, 100);
        currentPage = index;
    };

    window.mySwipe = Swipe(document.getElementById('slider'), {
       continuous: false, 
       callback: cb
    });
    mySwipe.setup();

    var initialhash = location.hash;
    switch(initialhash) {
        case '#live':
            break;
        case '#stats':
            mySwipe.slide(1,200);
            break;
        case '#news':
            mySwipe.slide(2,200);
            break;
        case '#photos':
            mySwipe.slide(3,200);
            break;
        case '#video':
            mySwipe.slide(4,200);
            break;
        default:
            break;
    }

    function switchShowingClass(elema) {
        $('.button > a').each( function() { $(this).removeClass('showing'); console.log('removed'); });
        $(elema).addClass('showing');
    }

    $( window ).on( "swiperight", function( event ) { 
        var swipePage = (currentPage > 0) ? currentPage - 1 : currentPage;
        console.log(swipePage);
        mySwipe.slide(swipePage,250);
        currentPage = swipePage;
    });

    $( window ).on( "swipeleft", function( event ) { 
        var swipePage = (currentPage < 4) ? currentPage + 1 : currentPage;
        console.log(swipePage);
        mySwipe.slide(swipePage,250);
        currentPage = swipePage;
    });

    function parseGameData() {
        // live updates from feed parse
        $.getJSON('./livescore.parse.php', function(data) {
            //set up team names and logos
            if (data["team-sport-content"]["league-content"]["competition"]) {
                var hometeamid = data["team-sport-content"]["league-content"]["competition"]["home-team-content"]["team"]["name"][1];
                var awayteamid = data["team-sport-content"]["league-content"]["competition"]["away-team-content"]["team"]["name"][1];
                var hometeamname = data["team-sport-content"]["league-content"]["competition"]["home-team-content"]["team"]["name"][0];
                var awayteamname = data["team-sport-content"]["league-content"]["competition"]["away-team-content"]["team"]["name"][0];
                $('#scores > div.teams').html('<h2>' + awayteamid.toUpperCase() + ' <span class="vs">vs</span> ' + hometeamid.toUpperCase() + '</h2>');
                if ( $('#away > img').length == 0) {
                    $('#away').prepend('<img src="./img/logo-' + awayteamid.toLowerCase() + '.png" alt="' + awayteamname + ' logo" />');
                }
                if ( $('#home > img').length == 0) {
                $('#home').prepend('<img src="./img/logo-' + hometeamid.toLowerCase() + '.png" alt="' + hometeamname + ' logo" />');
                }
            }

            //change possession arrow
            if (data["team-sport-content"]["league-content"]["competition"]["competition-state"]) {
                var possessor = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["possession"];
                var possession = '#' + possessor + 'poss';
                $('.possessors').removeClass('possession');
                $(possession).addClass('possession');
                
                // get the status of the game (down, distance, key event)
                var keyEvent = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["key-event"];
                var timeOut = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["stop-in-play"];
                var down = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["down"];
                var distance = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["distance"];
                var yardline = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["yard-line"];
                var yarddirection = data["team-sport-content"]["league-content"]["competition"]["competition-state"]["yard-direction"];
                downDistanceOut = '';
                if (keyEvent != null) {
                    downDistanceOut = keyEvent.charAt(0).toUpperCase() + keyEvent.slice(1);
                } else if (timeOut == 'timeout') {
                    downDistanceOut = 'Time out';
                } else if (timeOut == 'playunderreview') {
                    downDistanceOut = 'Play under review';
                } else if (down != null) {
                    if (down == 1) { 
                        downPretty = '1st';
                    } else if (down == 2) {
                        downPretty = '2nd';
                    } else if (down == 3) {
                        downPretty = '3rd';
                    } else if (down == 4) {
                        downPretty = '4th';
                    }
                    if (possessor == yarddirection) {
                        var yardside = 'own';
                    } else if (yarddirection == 'away') {
                        var yardside = 'SEA';
                    } else if (yarddirection == 'home') {
                        var yardside = 'DEN';
                    }
                    downDistanceOut = downPretty + ' &amp; ' + distance + ', ' + yardside + ' ' + yardline;
                }
                $('#down').html(downDistanceOut);
            }
            //update home team score
            var homescore = '';
            if (data["team-sport-content"]["league-content"]["competition"]["home-team-content"]) {
                $(data["team-sport-content"]["league-content"]["competition"]["home-team-content"]["stat-group"]).each(function(index, element){
                    if (element["scope"]["@attributes"]["type"] == 'competition') {
                        homescore = element["stat"]["@attributes"]["num"];
                    }
                })
            }
            $('#homescore').html(homescore);
            //update away team score
            var awayscore = '';
            if (data["team-sport-content"]["league-content"]["competition"]["away-team-content"]) {
                $(data["team-sport-content"]["league-content"]["competition"]["away-team-content"]["stat-group"]).each(function(index, element){
                    if (element["scope"]["@attributes"]["type"] == 'competition') {
                        awayscore = element["stat"]["@attributes"]["num"];
                    }
                })
            }
            $('#awayscore').html(awayscore);

            // get the start time/quarter/overtime/etc
            // start time
            var startTime = new Date(data["team-sport-content"]["league-content"]["competition"]["start-date"]);
            function formatAMPM(date) {
                var hours = startTime.getHours();
                var minutes = startTime.getMinutes();
                var ampm = hours >= 12 ? ' p.m.' : ' a.m.';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0'+minutes : minutes;
                var strTime = hours + ':' + minutes + ampm;
                return strTime;
            }
            var timeDisplay = (startTime.getMonth() + 1) + '/' + startTime.getDate() + ', ' + formatAMPM(startTime); 
            
            if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]) {
                // if the game isn't over
                var quarterOut = '';
                // quarters
                var quarter = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope"]["@attributes"]["num"];
                var overtime = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope"]["@attributes"]["type"];
                var quarterover = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope-status"];
                if (overtime == 'period') {
                    if (quarter == 1) {
                        quarterOut = (quarterover == 'complete') ? 'End of 1st' : '1st quarter';
                    } else if (quarter == 2) {
                        quarterOut = (quarterover == 'complete') ? 'Halftime' : '2nd quarter';
                    } else if (quarter == 3) {
                        quarterOut = (quarterover == 'complete') ? 'End of 3rd' : '3rd quarter';
                    } else if (quarter == 4) {
                        quarterOut = (quarterover == 'complete') ? 'Final' : '4th quarter';
                    }
                } else if (overtime == 'overtime') {
                    if (quarter == 1) {
                        quarterOut = (quarterover == 'complete') ? 'Final (OT)' : '1st overtime';
                    } else if (quarter == 2) {
                        quarterOut = (quarterover == 'complete') ? 'Final (2 OT)' : '2nd overtime';
                    } else if (quarter == 3) {
                        quarterOut = (quarterover == 'complete') ? 'Final (3 OT)' : '3rd overtime';
                    } else if (quarter == 4) {
                        quarterOut = (quarterover == 'complete') ? 'Final (4 OT)' : '4th overtime';
                    }
                }
            }
            if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]) {
                // time remaining only if game still running
                if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]["competition-status"] != 'complete' && data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope-status"] != 'complete') {
                    var timeRemain = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["clock"];
                    var timeChunks = timeRemain.split(':');
                    var timeRemaining = timeChunks[1] + ':' + timeChunks[2];
                }
            }
            // if we have a quarter, we'll display it, otherwise we'll put in the start time
            if (quarter != null) {
                $('#quarter').html(quarterOut);
                if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]) {
                    if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]["competition-status"] == 'in-progress') {
                        if (timeRemaining) { $('#bullet').html('&bull;'); }
                        var timeToShow = (timeRemaining) ? timeRemaining : '';
                        $('#remaining').html(timeToShow);
                    } else if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]["competition-status"] == 'complete') {
                        $('#quarter').html(quarterOut);
                    }
                }
            } else {
                $('#quarter').html(timeDisplay);
            }
        });
    }
    parseGameData();

    function refreshNews() {
        $.getScript('http://extras.denverpost.com/cache/gametracker-broncos.js').done(function( script, textStatus) {
                console.log('Successfully refreshed headlines.');
            }).fail(function(jqxhr, settings,exception ) {
                $('#ajaxheadlines').prepend('<p class="newserror">There was a problem retreiving new headlines.</p>')
            });
    }

    $('#headlinesrefresh').on('click touchend', function() {
        refreshNews();
    })

    $(document).ready(function() {
        $.ajaxSetup({ cache: false });
        setInterval(function() {
            parseGameData();
        }, 10000);
    });
</script>
<!-- <script type="text/javascript" src="../adrun.js"></script> -->

<?php
require('../footer.php');
?>