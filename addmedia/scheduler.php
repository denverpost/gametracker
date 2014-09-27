<?php

include('../functions.php');

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
	if (test_url($feedteam['url'])) {
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
				$sched[$feedteam['name']][$line]['gametime'] = (string)$competitions->{'start-date'}[0];
				$sched[$feedteam['name']][$line]['gametimeunix'] = $gametime = strtotime($competitions->{'start-date'}[0]);
				$sched[$feedteam['name']][$line]['gametimepretty'] = date("M j, Y g:i T",$gametime);
				$sched[$feedteam['name']][$line]['us'] = (string)$competitions->{'home-team-content'}[0]->{'team'}[0]->{'name'}[0];
				$sched[$feedteam['name']][$line]['vs'] = ' vs. ' . $competitions->{'away-team-content'}[0]->{'team'}[0]->{'name'}[0];
				//echo $sched[$feedteam['name']][$line]['gametime']."\n";
				$line++;
			} else if (ltrim($competitions->{'away-team-content'}[0]->{'team'}[0]->{'id'}[0],$teamtrim) == $feedteam['teamid']) {
				$sched[$feedteam['name']][$line]['location'] = 'away';
				$sched[$feedteam['name']][$line]['gameid'] = ltrim($competitions->{'id'}[0],$comptrim);
				$sched[$feedteam['name']][$line]['gametime'] = (string)$competitions->{'start-date'}[0];
				$sched[$feedteam['name']][$line]['gametimeunix'] = $gametime = strtotime($competitions->{'start-date'}[0]);
				$sched[$feedteam['name']][$line]['gametimepretty'] = date("M j, Y g:i T",$gametime);
				$sched[$feedteam['name']][$line]['us'] = (string)$competitions->{'away-team-content'}[0]->{'team'}[0]->{'name'}[0];
				$sched[$feedteam['name']][$line]['vs'] = ' at ' . $competitions->{'home-team-content'}[0]->{'team'}[0]->{'name'}[0];
				//echo $sched[$feedteam['name']][$line]['gametime']."\n";
				$line++;
			}
		}
	}
	sleep(10);
}

if (put_schedule($sched)) echo "\n" . 'Schedule data updated!' . "\n"."\n";

?>