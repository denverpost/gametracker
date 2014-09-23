var getDataLoc = window.location.href + 'livescore.parse.php';

function parseGameData() {
    // live updates from feed parse
    $.getJSON(getDataLoc, function(data) {
        hometeamid = awayteamid = hometeamname = awayteamname = '';
        //set up team names and logos
        if (data["team-sport-content"]["league-content"]["competition"] && data["team-sport-content"]["league-content"]["competition"]["home-team-content"] && data["team-sport-content"]["league-content"]["competition"]["away-team-content"]) {
            hometeamid = data["team-sport-content"]["league-content"]["competition"]["home-team-content"]["team"]["name"][1];
            awayteamid = data["team-sport-content"]["league-content"]["competition"]["away-team-content"]["team"]["name"][1];
            hometeamname = data["team-sport-content"]["league-content"]["competition"]["home-team-content"]["team"]["name"][0];
            awayteamname = data["team-sport-content"]["league-content"]["competition"]["away-team-content"]["team"]["name"][0];
            $('#scores > div.teams').html('<h2>' + awayteamid.toUpperCase() + ' <span class="vs">vs</span> ' + hometeamid.toUpperCase() + '</h2>');
            if ( $('#away > img').length == 0) {
                $('#away').prepend('<img src="./img/logo-' + awayteamid.toLowerCase() + '.png" alt="' + awayteamname + ' logo" />');
            }
            if ( $('#home > img').length == 0) {
            $('#home').prepend('<img src="./img/logo-' + hometeamid.toLowerCase() + '.png" alt="' + hometeamname + ' logo" />');
            }
            console.log(hometeamid + ', ' + awayteamid + ', ' + hometeamname + ', ' + awayteamname);
        }

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
                    quarterOut = (quarterover == 'complete' && (homescore != awayscore)) ? 'Final' : '3rd period';
                }
            } else if (overtime == 'overtime') {
                if (quarter == 1) {
                    quarterOut = (quarterover == 'complete' && (homescore != awayscore)) ? 'Final (OT)' : '1st overtime';
                } else if (quarter == 2) {
                    quarterOut = (quarterover == 'complete' && (homescore != awayscore)) ? 'Final (2 OT)' : '2nd overtime';
                } else if (quarter == 3) {
                    quarterOut = (quarterover == 'complete' && (homescore != awayscore)) ? 'Final (3 OT)' : '3rd overtime';
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
                    if (timeRemaining) { $('#bullet').html('&bull;'); } else { $('#bullet').html(''); }
                    var timeToShow = (timeRemaining) ? timeRemaining : '';
                    $('#remaining').html(timeToShow);
                } else if (data["team-sport-content"]["league-content"]["competition"]["result-scope"]["competition-status"] == 'complete') {
                    $('#quarter').html(quarterOut);
                }
            }
        } else {
            $('#quarter').html('Next game: ' + timeDisplay);
        }
    });
}
parseGameData();