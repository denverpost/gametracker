var hideheight = '';
var heightin = '';
var moreAd = true;
if ( $(window).width() >= 300 && $(window).width() < 740 ) {
        hideheight = '50px';
        heightin = '100px';
    } else if ($(window).width() > 740 ) {
        hideheight = '100px';
        heightin = '200px';
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