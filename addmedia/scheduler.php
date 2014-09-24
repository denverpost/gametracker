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
function put_schedule($configin) {
	file_put_contents('./schedule.json', json_encode($configin)) or die("Couldn't open schedule.json for writing!");
	return true;
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
					array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/hockey/NHL/schedule/schedule_NHL.xml',
							'name'=>'avs',
							'teamid'=>'1',
							'sport'=>'hockey'
							),
					array(	'url'=>'http://xml.sportsdirectinc.com/sport/v2/football/NCAAF/schedule/schedule_NCAAF.xml',
							'name'=>'cu',
							'teamid'=>'90',
							'sport'=>'football'
							)
					);

foreach ($feedurls as $feedteam) {
	if (get_http_response_code($feedteam['url']) != "404") {
		$xml = file_get_contents($feedteam['url']);
	}

	if ($xml) {
		$object = simplexml_load_string($xml);

		$line = 0;
		//var_dump($object);
		foreach($object->{'team-sport-content'}[0]->{'league-content'}[0]->{'season-content'}[0]->{'competition'} as $competitions) {
			$teamtrim = '/sport/' . $feedteam['sport'] . '/team:';
			$comptrim = '/sport/' . $feedteam['sport'] . '/competition:';
			if (ltrim($competitions->{'home-team-content'}[0]->{'team'}[0]->{'id'}[0],$teamtrim) == $feedteam['teamid']) {
				$sched[$feedteam['name']][$line]['location'] = 'home';
				$sched[$feedteam['name']][$line]['gameid'] = ltrim($competitions->{'id'}[0],$comptrim);
				$sched[$feedteam['name']][$line]['gametime'] = $gametime = strtotime($competitions->{'start-date'}[0]);
				$sched[$feedteam['name']][$line]['gametimepretty'] = date("M j, Y g:i T",$gametime);
				$sched[$feedteam['name']][$line]['us'] = (string)$competitions->{'home-team-content'}[0]->{'team'}[0]->{'name'}[0];
				$sched[$feedteam['name']][$line]['vs'] = ' vs. ' . $competitions->{'away-team-content'}[0]->{'team'}[0]->{'name'}[0];
				echo $sched[$feedteam['name']][$line]['gametimepretty'];
				$line++;
			} else if (ltrim($competitions->{'away-team-content'}[0]->{'team'}[0]->{'id'}[0],$teamtrim) == $feedteam['teamid']) {
				$sched[$feedteam['name']][$line]['location'] = 'away';
				$sched[$feedteam['name']][$line]['gameid'] = ltrim($competitions->{'id'}[0],$comptrim);
				$sched[$feedteam['name']][$line]['gametime'] = $gametime = strtotime($competitions->{'start-date'}[0]);
				$sched[$feedteam['name']][$line]['gametimepretty'] = date("M j, Y g:i T",$gametime);
				$sched[$feedteam['name']][$line]['us'] = (string)$competitions->{'away-team-content'}[0]->{'team'}[0]->{'name'}[0];
				$sched[$feedteam['name']][$line]['vs'] = ' at ' . $competitions->{'home-team-content'}[0]->{'team'}[0]->{'name'}[0];
				echo $sched[$feedteam['name']][$line]['gametimepretty'];
				$line++;
				//echo $feedteam['name'] . ': ' . $teamlocation . ', id: ' . $gameid . ', at: ' . date("Y-m-d h:i:sa T",$gametime) . ' (' . $gametime . ')' . "\n";
			}
		}
	}
	sleep(5);
}

if (put_schedule($sched)) echo "\n" . 'Schedule data updated!' . "\n"."\n";

?>