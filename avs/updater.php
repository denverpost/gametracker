<?php

include('../functions.php');

$iterations = (isset($argv[1])) ? $argv[1] : 60;
//get the xml from SportsDirect

$fileteam = 'avs';

$today = time();
$dateoffset = 432000; //5 days (in seconds)

$config = get_config($fileteam);
$schedule = get_schedule();

$nextgame = get_next_game($schedule,$fileteam,$today,$dateoffset);
var_dump($nextgame);

$feedurl = sprintf($config[0]['scores_url'],$config[0]['gameid']);

//run 20 times since cron can only do every 60 sec and we're checking every 5.
$i = 0;
while($i < $iterations) {
	if (test_url($feedurl)) {
		$xml = file_get_contents($feedurl);
	}
	//$xml = file_get_contents('/Users/danielschneider/Sites/gametracker/broncos/nfl_1st_quarter_sample.xml'); //for testing purposes

	//write the xml to disk if it exists, else place a blank xml file that the interpreter knows to ignore -- but only up until game time -- then we keep whatever we got last.
	if (isset($xml)) {
		$object->asXML('updates.xml');
	} else if (time() < $nextgame['gametimeunix']) {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/'.$config[0]['sport'].'/competition:'.$nextgame['gameid'].'</id><start-date>'.$nextgame['gametime'].'</start-date></competition></league-content></team-sport-content><custom-content><heading>'.$nextgame['us'].$nextgame['vs'].'</heading><unixtime>'.$nextgame['gametimeunix'].'</unixtime></custom-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		//echo $i;
	}
	//Check every 5 seconds -- max rate recommended by SportsDirect
	sleep(5);
	$i++;
}

?>