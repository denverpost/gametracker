<!DOCTYPE html>
<html lang="en" class="no-js">

<?php 
include('../functions.php');

$fileteam = end(array_filter(explode('/',trim($_SERVER['REQUEST_URI']))));
$config = get_config($fileteam);
?>

<head profile="http://gmpg.org/xfn/11">

<title><?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker from The Denver Post</title>

<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="http://gametracker.denverpost.com/<?php echo $fileteam; ?>/" />
<meta name="twitter:title" value="<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker from The Denver Post" />
<meta name="twitter:description" value="Live updates, news, photos, videos and more from today's <?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> game." />
<meta name="twitter:image" value="<?php echo $config[0]['share_img']; ?>" />
<meta name="twitter:site" value="@denverpost" />
<meta name="twitter:creator" content="@<?php echo $config[0]['twitter_creator']; ?>" />
<meta name="twitter:domain" value="gametracker.denverpost.com" />

<meta property="og:title" content="<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker from The Denver Post" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://gametracker.denverpost.com/<?php echo $fileteam; ?>/" />
<meta property="og:image" content="<?php echo $config[0]['share_img']; ?>" />
<meta property="og:site_name" content="<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker from The Denver Post" />
<meta property="og:description" content="Live updates, news, photos, videos and more from today's <?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> game." />
<meta property="article:publisher" content="http://www.facebook.com/denversports" />

<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en, sv" />
<meta name="Copyright" content="Copyright 2014 The Denver Post." />
<meta name="news_keywords" content="<?php echo $config[0]['news_keywords']; ?>" />

<link rel="canonical" href="http://gametracker.denverpost.com/<?php echo $fileteam; ?>/" />
<link rel="icon" href="http://extras.mnginteractive.com/live/media/favIcon/dpo/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="../style.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Chivo:400,900,400italic,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://extras.mnginteractive.com/live/partners/MediaCenter/embedded_galleries/mc_embed_styles.css" type="text/css" />


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/custom.modernizr.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/swipe.js"></script>
<script type="text/javascript" src="//extras.denverpost.com/media/js/gt/jquery.mobile-1.4.0.min.js"></script>
<script type="text/javascript" src="//local.digitalfirstmedia.com/common/dfm/assets/js/dfm-core-level1.js"></script>
<script type="text/javascript" src="//extras.mnginteractive.com/live/partners/MediaCenter/embedded_galleries/mc_embed.js"></script>
<script type="text/javascript" src="//www.googletagservices.com/tag/js/gpt.js"></script>

<?php if (isset($config[0]['teamcolor'])): ?>
<style type="text/css">
#topper {
    background:#<?php echo $config[0]['teamcolor']; ?>!important;
}
</style>
<?php endif; ?>

<script type="text/javascript">
//Configure DFM Variables
    dfm.api("data","siteId",          "Gametracker"); //Assign a siteid for your property
    dfm.api("data","siteName",        "<?php echo $config[0]['nickname']; ?> Gametracker"); //Assign user-friendly name for site
    dfm.api("data","siteDomain",      "gametracker.denverpost.com"); //Domain of the News.com, WordPress, Blog
    dfm.api("data","actualDomain",    "gametracker.denverpost.com/<?php echo $fileteam; ?>");//Full URl of site
    dfm.api("data","localCommonUrl",  "");
    dfm.api("data","localAssetsUrl",  "");
    dfm.api("data","contentId",       "<?php echo $config[0]['nickname']; ?> Gametracker");
    dfm.api("data","sectionName",     "<?php echo $config[0]['nickname']; ?> Gametracker"); //Omniture section/category name
    dfm.api("data","pageId",          "");
    dfm.api("data","pageUrl",         "http://gamecenter.denverpost.com/<?php echo $fileteam; ?>/"); //Full URl of site
    dfm.api("data","pageVanityUrl",   "http://gamecenter.denverpost.com/<?php echo $fileteam; ?>/"); //Full URl of site
    dfm.api("data","pageTitle",       "<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?>Gametracker from The Denver Post");
    dfm.api("data","pageType",        "");
    dfm.api("data","abstract",        "Live updates, news, photos, videos and more from today's <?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> game.");
    dfm.api("data","keywords",        "Live updates, news, photos, videos and more from today's <?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> game.");
    dfm.api("data","title",           "Live updates, news, photos, videos and more from today's <?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> game.");
    dfm.api("data","sectionId",       "<?php echo $config[0]['nickname']; ?> Gametracker");
    dfm.api("data","slug",            "<?php echo strtolower($config[0]['nickname']); ?>-gametracker");
    dfm.api("data","byline",          "The Denver Post");
    dfm.api("data","NetworkID",       "8013");
    dfm.api("data","Taxonomy1",       "Gametracker");
    dfm.api("data","Taxonomy2",       "<?php echo $config[0]['nickname']; ?>");
    dfm.api("data","Taxonomy3",       "");
    dfm.api("data","Taxonomy4",       "");
    dfm.api("data","kv",              "News");
    dfm.api("data","omnitureAccount", "denverpost"); //Omniture s_account.
</script>

<script type="text/javascript">
    //configure Chartbeat variables
    var _sf_startpt=(new Date()).getTime();
    var teamNewsFeed = 'http://extras.denverpost.com/cache/gametracker-<?php echo strtolower($config[0]['friendlyname']); ?>.js';
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