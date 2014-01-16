<?php

$i = 0;
while($i < 21) {
	$xml = file_get_contents('http://xml.sportsdirectinc.com/sport/v2/football/NFL/livescores/livescores_42012.xml');
	echo $xml;

	if ($xml) {
		file_put_contents('updates.xml', $xml);
	} else {
		$alternative = '<sport:content xmlns:sport="http://xml.sportsdirectinc.com/sport/v2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><team-sport-content><league-content><competition><id>/sport/football/competition:26315</id><start-date>2014-01-12T16:40:00.000-05:00</start-date></competition></league-content></team-sport-content></sport:content>';
		file_put_contents('updates.xml', $alternative);
		echo $i;
	}
	sleep(5);
	$i++;
}

?>