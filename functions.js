function rotateNewsArrow() {
    $({deg: 0}).animate({deg: 360}, {
        duration: 500,
        step: function(now) {
            $('#headlinesrefresh > img').css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
}

function refreshNews() {
    $.getScript(teamNewsFeed).done(function() {
            //console.log('Successfully refreshed headlines.');
        }).fail(function() {
            $('#ajaxheadlines').prepend('<p class="newserror">There was a problem retreiving new headlines.</p>');
        });
}

$('#headlinesrefresh').on('click touchend', function() {
    rotateNewsArrow();
    refreshNews();
});

$.event.special.swipe.horizontalDistanceThreshold = (screen.availWidth)/3;
$.event.special.swipe.verticalDistanceThreshold = (screen.availWidth)/10;
$.event.special.swipe.scrollSupressionThreshold = (screen.availWidth)/6;

var body = document.getElementsByTagName('body')[0];
var positions = [];
var currentPage = 0;
var offset = [];

var positions = [];
currentPage = '';
var cb = function(index) {
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
    $('.button > a').each( function() { $(this).removeClass('showing'); });
    $(elema).addClass('showing');
}

$( window ).on( "swiperight", function( event ) { 
    var swipePage = (currentPage > 0) ? currentPage - 1 : currentPage;
    mySwipe.slide(swipePage,250);
    currentPage = swipePage;
});

$( window ).on( "swipeleft", function( event ) { 
    var swipePage = (currentPage < 4) ? currentPage + 1 : currentPage;
    mySwipe.slide(swipePage,250);
    currentPage = swipePage;
});

function countdown(yr,m,d,hr,min,sec,montharray){
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
    var todaystring=Date.parse(todaystring1);
    var futurestring1=(montharray[m]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1);
    var dd=futurestring-todaystring;
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    if(dday>0||dhour>0||dmin>0||dsec>0){
        var thecountdown = dday + 'd, ' + dhour + 'h, ' + dmin + 'm, ' + dsec + 's';
        thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
        thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
        thecountdown = (thecountdown.substring(0,1) != 0 ) ? thecountdown : thecountdown.substring(4);
        document.getElementById('countdownform').innerHTML=thecountdown;
        setTimeout(function(){countdown(yr,m,d,hr,min,sec,montharray)},1000);
    }
}

var startedCount = false;

function startCountdown(inputtime){
    startedCount = true;
    var current="";
    var year=(inputtime.getYear() < 1000) ? inputtime.getYear() + 1900 : inputtime.getYear();
    var month=inputtime.getMonth();
    var day=inputtime.getDate();
    var hour=inputtime.getHours();
    var minute="0"+inputtime.getMinutes();
    var second="0"+inputtime.getSeconds();
    var months=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    countdown(year,month,day,hour,minute,second,months);
}