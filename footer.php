<div id="bottombuttons">
    <ul>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(0,200);switchShowingClass(this);"><img src="../button-live.png" />Live</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(1,200);switchShowingClass(this);"><img src="../button-stats.png" />Stats</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(2,200);switchShowingClass(this);"><img src="../button-news.png" />News</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(3,200);switchShowingClass(this);"><img src="../button-media.png" />Media</a></li>
        <li class="button"><a href="javascript:void(0)" onClick="mySwipe.slide(4,200);switchShowingClass(this);"><img src="../button-discuss.png" />Discuss</a></li>
    </ul>
</div>

<script type="text/javascript" src="../parse-<?php echo $config[0]['sport']; ?>.js"></script>
<script type="text/javascript" src="../functions.js"></script>
<?php if (isset($config[0]['adsenabled']) && $config[0]['adsenabled']) { ?>
<script type="text/javascript" src="../adrun.js"></script>
<?php } ?>

<script type="text/javascript">
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.title = "<?php echo ucfirst($config[0]['teamname']) . ' ' . ucfirst($config[0]['nickname']); ?> Gametracker from The Denver Post";
    _sf_async_config.uid = 2671;
    _sf_async_config.domain = "denverpost.com";
    _sf_async_config.sections = "<?php echo ucfirst($config[0]['nickname']); ?> Gametracker";
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