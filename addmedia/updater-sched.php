<?php

//get the xml from SportsDirect
function simplexml_insert_after(SimpleXMLElement $insert, SimpleXMLElement $target)
{
    $target_dom = dom_import_simplexml($target);
    $insert_dom = $target_dom->ownerDocument->importNode(dom_import_simplexml($insert), true);
    if ($target_dom->nextSibling) {
        return $target_dom->parentNode->insertBefore($insert_dom, $target_dom->nextSibling);
    } else {
        return $target_dom->parentNode->appendChild($insert_dom);
    }
}
function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

$fileteam = 'broncos';
function get_config($teamdir) {
	// Puts the config into an array
    $configs = json_decode(file_get_contents('../'.$teamdir.'/config.json'),true);
    return $configs;
}
$config = get_config($fileteam);
$feedurl = 'http://xml.sportsdirectinc.com/sport/v2/football/NFL/schedule/schedule_NFL.xml';
//echo $feedurl;

//run 20 times since cron can only do every 60 sec and we're checking every 5.
$i = 0;
while($i < 20) {
	if (get_http_response_code($feedurl) != "404") {
		$xml = file_get_contents($feedurl);
	}
	//$xml = file_get_contents('/Users/danielschneider/Sites/gametracker/broncos/nfl_1st_quarter_sample.xml'); //for testing purposes
	//var_dump($xml);
	if ($xml) {
		$object = simplexml_load_string($xml);

		//echo isset($object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-line'});

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
	if ($xml) {
		$object->asXML('updates.xml');
	} else if (time() < 1391347800) {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/football/competition:42017</id><start-date>2014-02-02T18:30:00-05:00</start-date></competition></league-content></team-sport-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		//echo $i;
	}
	//Check every 5 seconds -- max rate recommended by SportsDirect
	sleep(5);
	$i++;
}

?>