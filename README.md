# ABOUT #

v 0.2.7

Gametracker pulls and displays live stats in a mobile-focused web display in concert with other elements such as a live blog, photo galleries, stats/box score, news feed and videos.

## TO DO ##

* Setup schedule.php cron on prod
* Push new stuff; do rsync with delete (ask Jeff)
* Add get_schedule to updater.php; use it to fill out placeholder XML output.
* Disambiguate updater -- let it accept a get or command-line variable and exist only once
* Add basketball functionality (Nuggets, CU/CSU hoops)
* Single minute-by-minute update checker; run for games if needed, else just run feed checks once per day...
