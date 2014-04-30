<!DOCTYPE html>
<html lang="en" class="no-js">

<?php 

function csv_to_array($filename='', $delimiter=',') {
    if(!file_exists($filename) || !is_readable($filename))
      return FALSE;
    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
      while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
        if(!$header)
          $header = $row;
        else
          $data[] = array_combine($header, $row);
        }
        fclose($handle);
      }
    return $data;
    }

    $inputcsv = csv_to_array('config.csv');

?>

<head profile="http://gmpg.org/xfn/11">

<title>Colorado Avalanche Gametracker from The Denver Post</title>

<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="http://gametracker.denverpost.com/avs/" />
<meta name="twitter:title" value="Colorado Avalanche Gametracker from The Denver Post" />
<meta name="twitter:description" value="Colorado Avalanche vs. Minnesota Wild Game 7: Live updates, news, photos, videos and more" />
<meta name="twitter:image" value="http://gametracker.denverpost.com/avs/gametracker-fb-image-avs.jpg" />
<meta name="twitter:site" value="@denversportnews" />
<meta name="twitter:domain" value="gametracker.denverpost.com" />
<meta name="twitter:creator" content="@denversportnews" />

<meta property="og:title" content="Colorado Avalanche Gametracker from The Denver Post" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://gametracker.denverpost.com/avs/" />
<meta property="og:image" content="http://gametracker.denverpost.com/avs/gametracker-fb-image-avs.jpg" />
<meta property="og:site_name" content="Colorado Avalanche Gametracker from The Denver Post" />
<meta property="og:description" content="Colorado Avalanche vs. Minnesota Wild Game 7: Live updates, news, photos, videos and more" />
<meta property="article:publisher" content="http://www.facebook.com/denversports" />

<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en, sv" />
<meta name="Copyright" content="Copyright 2014 The Denver Post." />
<link rel="canonical" href="http://gametracker.denverpost.com/avs/" />
<meta name="news_keywords" content="Colorado Avalanche, Minnesota Wild, Game 7, Playoffs, NHL, playoffs, postseason, stanley cup, game, stats, live, blog, video, photos, social, tracker, score, updates" />

<link rel="stylesheet" type="text/css" href="./style.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Chivo:400,900,400italic,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://extras.mnginteractive.com/live/partners/MediaCenter/embedded_galleries/mc_embed_styles.css" type="text/css" />


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/custom.modernizr.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/swipe.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/jquery.mobile-1.4.0.min.js"></script>
<script type="text/javascript" src="//local.digitalfirstmedia.com/common/dfm/assets/js/dfm-core-level1.js"></script>
<script type="text/javascript" src="//extras.mnginteractive.com/live/partners/MediaCenter/embedded_galleries/mc_embed.js"></script>
<script type="text/javascript" src="//www.googletagservices.com/tag/js/gpt.js"></script>


<script type="text/javascript">
//Configure DFM Variables
    dfm.api("data","siteId",          "Gametracker"); //Assign a siteid for your property
    dfm.api("data","siteName",        "Avs Gametracker"); //Assign user-friendly name for site
    dfm.api("data","siteDomain",      "gametracker.denverpost.com"); //Domain of the News.com, WordPress, Blog
    dfm.api("data","actualDomain",    "gametracker.denverpost.com/avs");//Full URl of site
    dfm.api("data","localCommonUrl",  "");
    dfm.api("data","localAssetsUrl",  "");
    dfm.api("data","contentId",       "Avs Gametracker");
    dfm.api("data","sectionName",     "Avs Gametracker"); //Omniture section/category name
    dfm.api("data","pageId",          "");
    dfm.api("data","pageUrl",         "http://gamecenter.denverpost.com/avs/"); //Full URl of site
    dfm.api("data","pageVanityUrl",   "http://gamecenter.denverpost.com/avs/"); //Full URl of site
    dfm.api("data","pageTitle",       "Colorado Avalanche Gametracker from The Denver Post");
    dfm.api("data","pageType",        "");
    dfm.api("data","abstract",        "Colorado Avalanche vs. Minnesota Wild Game 7: Live updates, news, photos, videos and more");
    dfm.api("data","keywords",        "Colorado Avalanche, Minnesota Wild, Game 7, Playoffs, NHL, playoffs, postseason, stanley cup, game, stats, live, blog, video, photos, social, tracker, score, updates");
    dfm.api("data","title",           "Colorado Avalanche vs. Minnesota Wild Game 7: Live updates, news, photos, videos and more");
    dfm.api("data","sectionId",       "Avs Gametracker");
    dfm.api("data","slug",            "avs-gametracker");
    dfm.api("data","byline",          "The Denver Post");
    dfm.api("data","NetworkID",       "8013");
    dfm.api("data","Taxonomy1",       "Gametracker");
    dfm.api("data","Taxonomy2",       "Avs");
    dfm.api("data","Taxonomy3",       "");
    dfm.api("data","Taxonomy4",       "");
    dfm.api("data","kv",              "News");
    dfm.api("data","omnitureAccount", "denverpost"); //Omniture s_account.
</script>

<script type="text/javascript">
    //configure Chartbeat variables
    var _sf_startpt=(new Date()).getTime();
</script>

</head>

<body class="gametracker">

<a href="https://plus.google.com/111267716732125387127?rel=author" style="display:none!important;">The Denver Post</a> 
<div id="omniture">
    <script language="JavaScript"><!--//
        /* Specify the Report Suite ID(s) to track here */
        var s_account= dfm.api("data","omnitureAccount");
        //-->
    </script>
    <script type="text/javascript" language="JavaScript" src='http://extras.mnginteractive.com/live/js/omniture/SiteCatalystCode_H_22_1_NC.js'></script>
    <script type="text/javascript" language="JavaScript" src='http://extras.mnginteractive.com/live/js/omniture/OmniUserObjAndHelper.js'></script>
    <script language="JavaScript"><!--//
        //Local Variables
        var contentId = dfm.api("data","contentId");
        var PaperBrand = getBrand2(s_account);
        var PageName = dfm.api("data","pageTitle");
        var SectionName = dfm.api("data","sectionName");

        if (contentId != "" && contentId != null && SectionName == "") {
            SectionName = dfm.api("data","sectionId");
        }
        var FriendlyName = SectionName;
        var ArticleTitle = "";
        if (contentId != "" && contentId != null) {
            ArticleTitle = dfm.api("data","pageTitle");
            FriendlyName = FriendlyName + " / "  +  ArticleTitle;
        }
        var domainName = getDomainName();
        userObj = new omniObj();
        userObj.load();
        userObj.update();
        userObj.save();
        /* You may give each page an identifying name, server, and channel on the next lines. */
        s.pageName=FriendlyName;
        s.channel=SectionName; // Same as prop1
        s.server="";// Blank
        s.pageType=""; // Error pages ONLY
        s.prop1="D=g";
        beanprop2 = ("" != "") && ("" != null) ? "" : "?";
        var escbeanprop2 = escape(beanprop2);
        var unescbeanprop2 = unescape(escbeanprop2);
        var articleId = dfm.api("data","contentId");        
        beanprop3 = ("" != "") && ("" != null) ? "" : "?";
        beanprop4 = ("" != "") && ("" != null) ? "" : "?";
        if(articleId != "" && articleId != null){
            beanprop5 = ("" != "") && ("" != null) ? "" : articleId +"_" +ArticleTitle;
        } else {
            beanprop5 = "?" ;
        }
        s.prop2='D=ch+' + "\"/" + unescbeanprop2 + "\"";
        s.prop3='D=ch+' + "\"/" + unescbeanprop2 + "/" + beanprop3 + "\"";
        s.prop4='D=ch+' + "\"/" + unescbeanprop2 + "/"+ beanprop3 + "/"+ beanprop4 + "\""; // Sub section 3  
        s.prop5='D=ch+' + "\"/" + unescbeanprop2 + "/" + beanprop3 + "/" + beanprop4 + "/" + beanprop5 + "\""; // Sub section 4
        s.prop6=dfm.api("data","Taxonomy1"); // Global - Section  TODO
        s.prop7=dfm.api("data","Taxonomy2"); // Global - Sub section 1  TODO
        s.prop8=dfm.api("data","Taxonomy3"); // Global - Sub section 2  TODO
        var sourceVal = ""; // Source of request, i.e. RSS, flash, etc...
        if(articleId != '' && articleId != null){
            if(s.prop9 == '' || s.prop9 == null){
                s.prop9 = sourceVal;
            }
        }
        s.prop10=""; // Reserved for RSS
        if(articleId != '' && articleId != null){
            s.prop11=ArticleTitle=="null"?"":'D="'+domainName+' / "+v26+" / "+c50';
        }
        s.prop12=dfm.api("data","byline");
        s.prop13=""; // Reserved for article
        s.prop14=""; // Reserved for article
        s.prop15=""; // Reserved for article
        s.prop16=""; // Search
        s.prop17=""; // Search
        s.prop18=""; // Search
        s.prop19=""; // Search
        s.prop20=""; // Reserved for Search
        s.prop21=""; // Reserved for Search
        s.prop22=""; // Reserved for Search
        s.prop23=""; // Reserved for Search
        s.prop24=""; // Reserved for Search
        s.prop25=""; // Reserved for Search
        s.prop26=""; // 3rd Party Vendors
        s.prop27=""; // OneSpot
        s.prop28=""; // Blank
        if(s.prop29 == null || s.prop29 == ''){
            s.prop29="";
        }
        s.prop30=""; // Form Analysis Plugin
        s.prop31=""; // Blank
        s.prop32=""; // Blank
        s.prop33=ArticleTitle=="null"?'D=c40+" / "+c43':'D=c40+" / "+c50+" / "+c9';
        s.prop34=ArticleTitle=="null"?'D=c40+" / "+c43':'D=c40+" / "+c43+" / "+c50';
        s.prop35=ArticleTitle=="null"?'D=v18=" / "+c40+" / "+c43':'D=v18+" / "+c40+" / "+c50';
        s.prop36=isCampaign(getCampaignValue("EADID")+getCampaignValue("CREF"), PaperBrand, PageName, ArticleTitle); // Campaign Tracking Code  + Paper Brand + Page Name
        s.prop37=isCampaign(getCampaignValue("IADID")+getCampaignValue("SOURCE"), PaperBrand, PageName, ArticleTitle); // Affiliate ID + Paper Brand + Page Name
        s.prop38=isCampaign(getCampaignValue("PARTNERID"), PaperBrand, PageName,ArticleTitle); // Internal Referral ID + Paper Brand + Page Name
        s.prop39="";                                                             // Search Engine + Keywords + Paper Brand + Page Name (populated by functions.js)
        s.prop40=PaperBrand;                                                     // Paper Brand
        s.prop41="";                                                             // Blank
        s.prop42="";
        s.prop43=SectionName; //
        s.prop44=ArticleTitle=="null"?"":'D=c40+" / "+c43+" / "+v26';
        s.prop45=ArticleTitle=="null"?"":'D=c40+" / "+c43+" / "+c12';
        s.prop46=getArticleHelperPage(domainName,"22133898",location.href,ArticleTitle); // ArticleID + Special Page Name + Article Title
        s.prop47=""; // Search
        s.prop48=""; // Blank
        s.prop49=""; // Blank
        s.prop50=ArticleTitle;
        /* E-commerce Variables */
        s.campaign=getCiQueryString("EADID")+getCiQueryString("CREF");          //External Campaign - ?EADID=id
        s.state="";
        s.zip="";
        s.events=getEvents(ArticleTitle, s.events);
        s.products="";
        s.purchaseID="";
        s.eVar1=getCiQueryString("PARTNERID");                                  // Internal Campaign - ?PID=id
        s.eVar2=getCiQueryString("IADID")+getCiQueryString("SOURCE");           // Affiliate ID - ?IADID=id
        s.eVar3=getBrandOnChange(PaperBrand);                                             //Paper Brand
        s.eVar4="D=pageName";
        s.eVar5="";
        s.eVar6="";
        s.eVar7="";
        s.eVar8="";
        s.eVar9="";
        s.eVar10="";
        s.eVar11="";
        s.eVar12="";
        s.eVar13="";
        s.eVar14=userObj.fPage|userObj.conPage|userObj.loginConPage?userObj.vType:''; //Visitory Type
        s.eVar15=userObj.fPage|userObj.userIdChange?userObj.userId:'';                     // User ID
        s.eVar16=userObj.conPage?userObj.rType:'';
        s.eVar17="";
        s.eVar18=getUserType();
        s.eVar19=userObj.fPage|userObj.conPage|userObj.aaPage?userObj.regStatus:''; //Registration Status
        s.eVar20=""; // Search
        s.eVar21="";
        s.eVar22="";
        s.eVar23="";                                                      // Refinements
        s.eVar24="D=c43";
        s.eVar25="";
        s.eVar26=articleId;  // article ID
        s.eVar50=getCiQueryString("AADID");
        //-->
    </script>
    <script type="text/javascript" src='http://extras.mnginteractive.com/live/js/omniture/functions.js'></script>
    <script type="text/javascript"><!--//
        var s_code=s.t();if(s_code)document.write(s_code);
        //-->
    </script>
    <script language="JavaScript"><!--//
        if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-');
        //-->
    </script>
    <noscript><img src="http://NeBnr.112.2O7.net/b/ss/NeBnr/1/H.17--NS/0" height="0" width="0" border="0" alt="" style="margin:0;padding:0;" /></noscript>
    <!-- End SiteCatalyst code version: H.17 -->
</div>

<div id="topper">
    
    <img src="denverpost-twitter-template-large.png" class="dplogo" />
    
    <div id="away">
        <img src="logo-wild.png" alt="Wild logo" />
        <span id="awayscore"></span>
    </div>

    <div id="scores">
        <div class="teams"><h2>MIN <span class="vs">vs</span> COL</h2></div>
        <div class="gamedata"></div>
        <div class="gamedata"><span id="quarter"></span> <span id="bullet"></span> <time id="remaining"></time></div>
    </div>
    
    <div id="home">
        <img src="logo-avs.png" alt="Avs logo" />
        <span id="homescore"></span>
    </div>

</div>

<!-- <div id="adwrapper">
    <a class="boxclose" href="javascript:void(0)" onclick="hideAdManual();"></a>
    
    <center>
    <div id='top_leaderboard' style="margin:5px auto;display:none;">
        <script type='text/javascript'>
            if ( $(window).width() >= 740 ) {
                $('div#top_leaderboard').css('display','block');
                googletag.defineSlot('/8013/denverpost.com/sports', [[728,90]], 'top_leaderboard').setTargeting('pos',['top_leaderboard']).setTargeting('kv', 'broncos_playoffs_2014').addService(googletag.pubads());
                googletag.pubads().enableSyncRendering();
                googletag.enableServices();
                googletag.display('top_leaderboard');
            }
        </script>
        <p>Advertisement</p>
    </div>

    <div id='mobile_banner' style="margin:0 auto;display:none;">
        <script type='text/javascript'>
            if ( $(window).width() >= 300 && $(window).width() < 740 ) {
                $('div#mobile_banner').css('display','block');
                googletag.defineSlot('/8013/denverpost.com/sports', [[300,50]], 'mobile_banner').setTargeting('pos',['sm_banner_mobile_top']).setTargeting('kv', 'broncos_playoffs_2014').addService(googletag.pubads());
                googletag.pubads().enableSyncRendering();
                googletag.enableServices();
                googletag.display('mobile_banner');
            }
        </script>
        <p>Advertisement</p>
    </div>
    </center>

</div> -->

<div id="slider" class="swipe">
    <div class="swipe-wrap" id="slidehi">
        <div id="swipe1" class="slide">
            <iframe src="<?php echo $inputcsv[0]['scribble']; ?>" width="100%" height="2000" frameborder="0"></iframe>
        </div>
        <div id="swipe2" class="slide">
            <div class="gallerywrap">
                <iframe src="<?php echo $inputcsv[0]['boxscore']; ?>" style="height:7000px;width:100%;background:#fff;" frameborder="no"></iframe>
            </div>
        </div>
        <div id="swipe3" class="slide">
            <div class="gallerywrap">
                <?php
                    $lines = file("media.txt", FILE_IGNORE_NEW_LINES);
                    array_reverse($lines);
                    $output = '';
                    $i = 0;
                    foreach($lines as $line) {
                        $i++;
                        if (strlen($line) == 13) {
                            $output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="videoEmbed%3$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("videoEmbed%3$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><div style="display:none"></div><script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script><object id="myExperience%1$s" class="BrightcoveExperience"><param name="bgcolor" value="#FFFFFF" /><param name="width" value="100%%" /><param name="height" value="100%%" /><param name="playerID" value="747347108001" /><param name="playerKey" value="AQ~~,AAAAADe65VU~,G496cZ36A_WJiqq5Paft4yTJ0a5PQX2r" /><param name="isVid" value="true" /><param name="isUI" value="true" /><param name="dynamicStreaming" value="true" /><param name="@videoPlayer" value="%2$s" /></object><script type="text/javascript">brightcove.createExperiences();</script></div><div class="clear"></div></div></div>',
                                (string)$line,
                                (string)$line,
                                $i
                            );
                        } else if (strlen($line) == 32) {
                            $output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="videoEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("videoEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><iframe width="100%%" height="100%%" src="http://player.ooyala.com/iframe.html?ec=%1$s&pbid=335ee8af53a04d778127e935cf28cc21&platform=html5-fallback&options[autoplay]=false" frameborder="0" allowfullscreen></iframe></div><div class="clear"></div></div></div>',
                                (string)$line,
                                $i
                            );
                        } else if ( strpos($line,'photos.denverpost.com') !== false) {
                            $output .= sprintf('<div class="gallerychunk"><div id="mc-embed-container%2$s"></div> <div class="clear" style="margin-bottom:10px;"></div> <script> $(document).ready(function(){ setTimeout(function(){ mc_embed_gallery = new MCGallery({ url : \'%1$s\',captionHeight : \'85px\', parentContainer: \'mc-embed-container%2$s\' }); }, %2$s000); }); </script> </div>',
                                (string)$line,
                                ($i * 2)
                            );
                        }
                    }
                    echo $output;
                ?>
            </div>
        </div>
        <div id="swipe4" class="slide">
            <div id="ajaxheadlines">
                <script type="text/javascript" src="http://extras.denverpost.com/cache/gametracker-avs.js"></script>
            </div>
            <div id="headlinesrefresh">
                <img src="button-refresh.png" alt="Tap to refresh headlines" />
            </div>
        </div>
        <div id="swipe5" class="slide">
            <script type="text/javascript" class="rebelmouse-embed-script" src="<?php echo $inputcsv[0]['rebel']; ?>"></script>
        </div>
    </div>
</div>

<div id="bottombuttons">
    <ul>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(0,200);switchShowingClass(this);"><img src="button-live.png" />Live</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(1,200);switchShowingClass(this);"><img src="button-stats.png" />Stats</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(2,200);switchShowingClass(this);"><img src="button-media.png" />Media</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(3,200);switchShowingClass(this);"><img src="button-news.png" />News</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(4,200);switchShowingClass(this);"><img src="button-social.png" />Social</a></li>
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
        case '#media':
            mySwipe.slide(2,200);
            break;
        case '#news':
            mySwipe.slide(3,200);
            break;
        case '#social':
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
            
            // parse and beautify the period/overtime (no code for shootout yet)
            if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]) {
                // if the game isn't over
                var quarterOut = '';
                // quarters
                var quarter = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope"]["@attributes"]["num"];
                var overtime = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope"]["@attributes"]["type"];
                var quarterover = data["team-sport-content"]["league-content"]["competition"]["result-scope"]["scope-status"];
                if (overtime == 'period') {
                    if (quarter == 1) {
                        quarterOut = (quarterover == 'complete') ? 'End of 1st' : '1st period';
                    } else if (quarter == 2) {
                        quarterOut = (quarterover == 'complete') ? 'End of 2nd' : '2nd period';
                    } else if (quarter == 3) {
                        quarterOut = (quarterover == 'complete') ? 'End of 3rd' : '3rd period';
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
            // if we have a quarter we'll display it, otherwise we'll put in the start time
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

    var hideheight = '';
    var heightin = '';
    var moreAd = true;
    if ( $(window).width() >= 300 && $(window).width() < 740 ) {
            hideheight = '50px';
            heightin = '50px'; // 100px if ad
        } else if ($(window).width() > 740 ) {
            hideheight = '100px';
            heightin = '100px'; // 200px if ad
        }
    function hideAd() {
        $('#slider').css('top', hideheight);
        $('#adwrapper').slideUp(150);
    }
    function hideAdManual() {
        $('#slider').css('top', hideheight);
        $('#adwrapper').slideUp(150);
        moreAd = false;
    }
    function showAd() {
        if (moreAd) {
            $('#slider').css('top', heightin);
            $('#adwrapper').slideDown(150);
        }
    }
    function determineAd() {
        if ( $(window).width() >= 300 && $(window).width() < 740 ) {
            showAd();
        } else if ($(window).width() > 740 ) {
            showAd();
        }
    }
    determineAd();

    function refreshNews() {
        $.getScript('http://extras.denverpost.com/cache/gametracker-avs.js').done(function( script, textStatus) {
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

<script type="text/javascript">
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.title = "Colorado Avalanche Gametracker from The Denver Post";
    _sf_async_config.uid = 2671;
    _sf_async_config.domain = "denverpost.com";
    _sf_async_config.sections = "Avs Gametracker";
    _sf_async_config.useCanonical = true;
    /** CONFIGURATION END **/
    (function(){
      function loadChartbeat() {
        window._sf_endpt=(new Date()).getTime();
        var e = document.createElement("script");
        e.setAttribute("language", "javascript");
        e.setAttribute("type", "text/javascript");
        e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
        document.body.appendChild(e);
      }
      var oldonload = window.onload;
      window.onload = (typeof window.onload != "function") ?
         loadChartbeat : function() { oldonload(); loadChartbeat(); };
    })();
</script>

</body>
</html>