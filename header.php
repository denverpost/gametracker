<!DOCTYPE html>
<html lang="en" class="no-js">

<?php 
include('../functions.php');

$fileteam = get_team();
$config = get_config($fileteam);
?>
<head profile="http://gmpg.org/xfn/11">

<title><?php echo (isset($config[0]['page_title']) && trim($config[0]['page_title']) != '') ? $config[0]['page_title'] : ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' Gametracker from The Denver Post'; ?></title>

<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="http://gametracker.denverpost.com/<?php echo $fileteam; ?>/" />
<meta name="twitter:title" value="<?php echo (isset($config[0]['twitter_title']) && trim($config[0]['twitter_title']) != '') ? $config[0]['twitter_title'] : ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' Gametracker from The Denver Post'; ?>" />
<meta name="twitter:description" value="<?php echo (isset($config[0]['twitter_description']) && trim($config[0]['twitter_description']) != '') ? $config[0]['twitter_description'] : 'Live updates, news, photos, videos and more from today\'s ' . ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' game.'; ?>" />
<meta name="twitter:image" value="<?php echo $config[0]['share_img']; ?>" />
<meta name="twitter:site" value="@denverpost" />
<meta name="twitter:creator" content="@<?php echo (isset($config[0]['twitter_creator']) && trim($config[0]['twitter_creator']) != '') ? $config[0]['twitter_creator'] : 'denverpost'; ?>" />
<meta name="twitter:domain" value="gametracker.denverpost.com" />

<meta property="og:title" content="<?php echo (isset($config[0]['fb_title']) && trim($config[0]['fb_title']) != '') ? $config[0]['fb_title'] : ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' Gametracker from The Denver Post'; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://gametracker.denverpost.com/<?php echo $fileteam; ?>/" />
<meta property="og:image" content="<?php echo $config[0]['share_img']; ?>" />
<meta property="og:site_name" content="<?php echo (isset($config[0]['page_title']) && trim($config[0]['page_title']) != '') ? $config[0]['page_title'] : ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' Gametracker from The Denver Post'; ?>" />
<meta property="og:description" content="<?php echo (isset($config[0]['fb_description']) && trim($config[0]['fb_description']) != '') ? $config[0]['fb_description'] : 'Live updates, news, photos, videos and more from today\'s ' . ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']) . ' game.'; ?>" />
<meta property="article:publisher" content="http://www.facebook.com/denversports" />

<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en, sv" />
<meta name="Copyright" content="Copyright 2014 The Denver Post." />
<meta name="keywords" content="<?php echo $config[0]['news_keywords']; ?>" />
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

</head>

<body class="gametracker">

<a href="https://plus.google.com/111267716732125387127?rel=author" style="display:none!important;">The Denver Post</a> 
    <!-- Google Tag Manager Data Layer -->
    <script>
    var is_mobile = function() {
      var check = false;
      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
      if ( check == true ) return 'YES';
      return 'NO';
    };
    analyticsEvent = function() {};
    analyticsSocial = function() {};
    analyticsVPV = function() {};
    analyticsClearVPV = function() {};
    analyticsForm = function() {};
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        'ga_ua':'UA-61435456-7',
        'quantcast':'p-4ctCQwtnNBNs2',
        'quantcast label': 'Denver',
        'comscore':'6035443',
        'errorType':'',
        'Publisher Domain':'denverpost.com',
        'Publisher Product':'denverpost.com',
        'Dateline':'',
        'Publish Hour of Day':'',
        'Create Hour of Day':'',
        'Update Hour of Day':'',
        'Behind Paywall':'NO',
        'Mobile Presentation':is_mobile(),
        'kv':'Sports',
        'Release Version':'',
        'Digital Publisher':'',
        'Platform':'custom',
        'Section':'Gametracker',
        'Taxonomy1':'<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker',
        'Taxonomy2':'Gametracker',
        'Taxonomy3':'',
        'Taxonomy4':'',
        'Taxonomy5':'',
        'Content Source':'',
        'Canonical URL': '',
        'Slug':'',
        'Content ID':'',
        'Page Type':'special',
        'Publisher State':'CO',
        'Byline':'',
        'Content Title':'',
        'URL':'',
        'Page Title':'',
        'User ID':''
    });
    </script>
    <!-- End Google Tag Manager Data Layer -->
    <!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TLFP4R" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>
    (function(w,d,s,l,i) {
    w[l]=w[l]||[];
    w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
    var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
    j.async=true;
    j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })
    (window,document,'script','dataLayer','GTM-TLFP4R');
    </script><!-- End Google Tag Manager -->
</div>