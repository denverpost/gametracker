# ABOUT #

v 0.2.7

Gametracker pulls and displays live stats in a mobile-focused web display in concert with other elements such as a live blog, photo galleries, stats/box score, news feed and videos.

## Dev environment setup ##

*Note: In Linux or Mac OS, you can run ```bash dev.sh``` from the gametracker directory to complete these steps automatically.*

1. Fetch the schedule data with ```sudo php editor/scheduler.php``` to create ```schedule.json```. It may take a minute or two.
2. Go into each team subdirectory and create the team config files from the included examples: ```cp config.example config.json```

#### Live game data ####

Manually run, or create a cron job for, ```updater.php``` in each team subdirectory. This script uses the team and game data from config.json and schedule.json to create ```updates.xml``` for each team. ```updates.xml``` is the data file fetched by the AJAX calls on the main Gametracker pages for live updating scores and game data.

The live blog is an embedded ScribbleLive article that updates on its own.

The news headlines are created by Simplepie similar to any other feed-driven blog listing we use. The refresh button fetches the latest version using AJAX and updates the page.

## TO DO ##

* Setup schedule.php cron on prod
* Push new stuff; do rsync with delete (ask Jeff)
* Add get_schedule to updater.php; use it to fill out placeholder XML output.
* Disambiguate updater -- let it accept a get or command-line variable and exist only once
* Add basketball functionality (Nuggets, CU/CSU hoops)
* Single minute-by-minute update checker; run for games if needed, else just run feed checks once per day...
