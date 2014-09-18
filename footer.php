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