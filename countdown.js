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