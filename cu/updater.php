<?php

include('../functions.php');

//get the xml from SportsDirect

$fileteam = 'cu';

$config = get_config($fileteam);

$feedurl = sprintf($config[0]['scores_url'],$config[0]['gameid']);

//run 20 times since cron can only do every 60 sec and we're checking every 5.
$i = 0;
while($i < 20) {
	if (test_url($feedurl)) {
		$xml = file_get_contents($feedurl);
	}
	//$xml = file_get_contents('/Users/danielschneider/Sites/gametracker/broncos/nfl_1st_quarter_sample.xml'); //for testing purposes
	//var_dump($xml);
	if (isset($xml)) {
		$object = simplexml_load_string($xml);

		//var_dump($object);

		//find a particular tag that has both attributes and a value and insert the values as key-value pairs in the DOM instead
		if (isset($object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-line'}) ) {
			
			$yardlineside = $object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-line'}[0]->attributes()->align;

			if ($yardlineside) {
				$insert = new SimpleXMLElement("<yard-direction/>");
				$target = current($object->xpath('//yard-line[last()]'));
				simplexml_insert_after($insert, $target);
				$object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-direction'} = $yardlineside;
			}
		}
	
	}

	//write the xml to disk if it exists, else place a blank xml file that the interpreter knows to ignore -- but only up until game time -- then we keep whatever we got last.
	if (isset($xml)) {
		$object->asXML('updates.xml');
	} else if (time() < 1407459600) {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/football/competition:42390</id><start-date>2014-08-07T21:00:00-04:00</start-date></competition></league-content></team-sport-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		//echo $i;
	}
	//Check every 5 seconds -- max rate recommended by SportsDirect
	sleep(5);
	$i++;
}

?>