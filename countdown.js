function countdown(yr,m,d,hr,min,sec,montharray){
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

function startCountdown(inputtime){
    var current="";
    var year=inputtime.getYear();
    var month=inputtime.getMonth();
    var day=inputtime.getDate();
    var hour=inputtime.getHours();
    var minute=inputtime.getMinutes();
    var second=inputtime.getSeconds();
    var tz=-7;
    var months=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    var thecountdown = '';
    countdown(year,month,day,hour,minute,second,months);
}