<?php

date_default_timezone_set('America/Denver');

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

$feedurls = array(	array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/football/NFL/schedule/schedule_NFL.xml',
							'name'=>'broncos',
							'teamid'=>'21',
							'sport'=>'football'
							),
					array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/football/NCAAF/schedule/schedule_NCAAF.xml',
							'name'=>'csu',
							'teamid'=>'89',
							'sport'=>'football'
							),
					array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/football/NCAAF/schedule/schedule_NCAAF.xml',
							'name'=>'cu',
							'teamid'=>'90',
							'sport'=>'football'
							),
					array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/hockey/NHL/schedule/schedule_NHL.xml',
							'name'=>'avs',
							'teamid'=>'1',
							'sport'=>'hockey'
							)
					);
//echo $feedurl;

foreach ($feedurls as $feedteam) {
	if (get_http_response_code($feedteam['url']) != "404") {
		$xml = file_get_contents($feedteam['url']);
	}
	//$xml = file_get_contents('/Users/danielschneider/Sites/gametracker/broncos/nfl_1st_quarter_sample.xml'); //for testing purposes

	if ($xml) {
		$object = simplexml_load_string($xml);

		//var_dump($object);
		foreach($object->{'team-sport-content'}[0]->{'league-content'}[0]->{'season-content'}[0]->{'competition'} as $competitions) {
			$teamtrim = '/sport/' . $feedteam['sport'] . '/team:';
			$comptrim = '/sport/' . $feedteam['sport'] . '/competition:';
			if (ltrim($competitions->{'home-team-content'}[0]->{'team'}[0]->{'id'}[0],$teamtrim) == $feedteam['teamid']) {
				$teamlocation = 'home';
				$gameid = ltrim($competitions->{'id'}[0],$comptrim);
				$gametime = strtotime($competitions->{'start-date'}[0]);
				echo $feedteam['name'] . ': ' . $teamlocation . ', id: ' . $gameid . ', at: ' . date("Y-m-d h:i:sa T",$gametime) . ' (' . $gametime . ')' . "\n";
			} else if (ltrim($competitions->{'away-team-content'}[0]->{'team'}[0]->{'id'}[0],$teamtrim) == $feedteam['teamid']) {
				$teamlocation = 'away';
				$gameid = ltrim($competitions->{'id'}[0],$comptrim);
				$gametime = strtotime($competitions->{'start-date'}[0]);
				echo $feedteam['name'] . ': ' . $teamlocation . ', id: ' . $gameid . ', at: ' . date("Y-m-d h:i:sa T",$gametime) . ' (' . $gametime . ')' . "\n";
			}
		}
		break;

		//find a particular tag that has both attributes and a value and insert the values as key-value pairs in the DOM instead
		/*if (isset($object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-line'}) ) {
			
			$yardlineside = $object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-line'}[0]->attributes()->align;

			if ($yardlineside) {
				$insert = new SimpleXMLElement("<yard-direction/>");
				$target = current($object->xpath('//yard-line[last()]'));
				simplexml_insert_after($insert, $target);
				$object->{'team-sport-content'}[0]->{'league-content'}[0]->{'competition'}[0]->{'competition-state'}[0]->{'yard-direction'} = $yardlineside;
			}
		}*/

	}

	//write the xml to disk if it exists, else place a blank xml file that the interpreter knows to ignore -- but only up until game time -- then we keep whatever we got last.
	

	/*


	if ($xml) {
		$object->asXML('updates.xml');
	} else if (time() < 1391347800) {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/football/competition:42017</id><start-date>2014-02-02T18:30:00-05:00</start-date></competition></league-content></team-sport-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		//echo $i;
	}

	*/

}

?>