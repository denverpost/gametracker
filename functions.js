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

$(document).ready(function() {
    $.ajaxSetup({ cache: false });
    setInterval(function() {
        parseGameData();
    }, 10000);
});