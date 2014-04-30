<?php

//get the xml from SportsDirect
function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

$fileteam = 'avs';
function get_config($teamdir) {
	// Puts the config into an array
    $configs = json_decode(file_get_contents('../'.$teamdir.'/config.json'),true);
    return $configs;
}
$config = get_config($fileteam);
$feedurl = 'http://xml.sportsdirectinc.com/sport/v2/hockey/NHL/livescores/livescores_' . $config[0]['gameid'] . '.xml';
echo $feedurl;

//run 20 times since cron can only do every 60 sec and we're checking every 5.
$i = 0;
while($i < 20) {
	if (get_http_response_code($feedurl) != "404") {
		$xml = file_get_contents($feedurl);
	}
	//$xml = file_get_contents('/Users/danielschneider/Sites/gametracker/avs/nhl_overtime_complete_sample.xml'); //for testing purposes
	var_dump($xml);
	if ($xml) {
		$object = simplexml_load_string($xml);	
	}

	//write the xml to disk if it exists, else place a blank xml file that the interpreter knows to ignore -- but only up until game time -- then we keep whatever we got last.
	if ($xml) {
		$object->asXML('updates.xml');
	} else if (time() < 1398907800) {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/hockey/competition:63057</id><start-date>2014-04-30T21:30:00-04:00</start-date></competition></league-content></team-sport-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		//echo $i;
	}
	//Check every 5 seconds -- max rate recommended by SportsDirect
	sleep(5);
	$i++;
}

?>