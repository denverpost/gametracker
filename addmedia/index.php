<html>
<head>
	<title>Add Media | Denver Post Gametracker</title>

	<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
	<div id="wrapper">
		<?php
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);

		//Just here for safekeeping for now...
		$teams = array(
			'HOU' => 'Houston Texans',
			'JAC' => 'Jacksonville Jaguars',
			'IND' => 'Indianapolis Colts',
			'TEN' => 'Tennessee Titans',
			'BAL' => 'Baltimore Ravens',
			'PIT' => 'Pittsburgh Steelers',
			'CLE' => 'Cleveland Browns',
			'CIN' => 'Cincinnati Bengals',
			'MIA' => 'Miami Dolphins',
			'NE' => 'New England Patriots',
			'BUF' => 'Buffalo Bills',
			'NYJ' => 'New York Jets',
			'KC' => 'Kansas City Chiefs',
			'DEN' => 'Denver Broncos',
			'SD' => 'San Diego Chargers',
			'OAK' => 'Oakland Raiders',
			'MIN' => 'Minnesota Vikings',
			'GB' => 'Green Bay Packers',
			'DET' => 'Detroit Lions',
			'CHI' => 'Chicago Bears',
			'PHI' => 'Philadeplphia Eagles',
			'DAL' => 'Dallas Cowboys',
			'NYG' => 'New York Giants',
			'WAS' => 'Washington Redskins',
			'ARI' => 'Arizona Cardinals',
			'STL' => 'St. Louis Rams',
			'SF' => 'San Francisco 49ers',
			'SEA' => 'Seattle Seahawks',
			'ATL' => 'Atlanta Falcons',
			'TB' => 'Tampa Bay Buccaneers',
			'NO' => 'New Orleans',
			'CAR' => 'Carolina Panthers'
		);

		$fileteam = ( isset($_REQUEST['team']) && $_REQUEST['team'] == ('avs' || 'broncos' || 'rockies' || 'nuggets' || 'rapids' || 'cu' || 'csu') ) ? $_REQUEST['team'] : false;
		$savedmessage = '';
		$editdetails = (isset($_REQUEST['details'])) ? $_REQUEST['details'] : false;

  		function get_config($teamdir) {
  		// Puts the config into an array
			$configs = json_decode(file_get_contents('../'.$teamdir.'/config.json'),true);
			return $configs;
		}
		function put_config($teamdir,$configin) {
			file_put_contents('../'.$teamdir.'/config.json', json_encode($configin)) or die("Couldn't open $teamdir config for writing!");
			return get_config($teamdir);
		}
		function test_img_url($image_url) {
			$handle = curl_init($image_url);
			curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($handle);
			$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
			if($httpCode != 200) {
			    $returns = 'Please try again with a valid URL.';
			} else {
				$returns = $image_url;
			}
			curl_close($handle);
			return $returns;
		}

		if (!$fileteam) { ?>
		
		<h2>Update Gametracker</h2>
		<p>Choose a team to update the gametracker for:</p>
		<ul>
			<li><a href="index.php?team=avs">Avalanche</a></li>
			<li><a href="index.php?team=broncos">Broncos</a></li>
			<li><a href="index.php?team=csu">CSU Rams</a></li>
			<li><a href="index.php?team=cu">CU Buffs</a></li>
		</ul>
		
		<?php } else {

		$config = get_config($fileteam);

		$saving = (isset($_REQUEST['saving'])) ? $_REQUEST['saving'] : false;

		if ($saving == 1) {
			
			if ($editdetails == 1) {
				$share_imgclean = test_img_url(trim($_POST['share_img']));
				$teamcolorclean = str_replace('#','',trim($_POST['teamcolor']));
				$news_keywordsclean = rtrim(trim($_POST['news_keywords']),',');
				$twitter_creatorclean = ltrim(trim($_POST['twitter_creator']),'@');
				$config[0]['teamname'] = ucfirst(trim($_POST['teamname']));
				$config[0]['nickname'] = ucfirst(trim($_POST['nickname']));
				$config[0]['shortname'] = strtoupper(trim($_POST['shortname']));
				$config[0]['friendlyname'] = ucfirst(trim($_POST['friendlyname']));
				$config[0]['displayshort'] = strtoupper(trim($_POST['displayshort']));
				$config[0]['teamcolor'] = $teamcolorclean;
				$config[0]['news_keywords'] = $news_keywordsclean;
				$config[0]['twitter_creator'] = $twitter_creatorclean;
				$config[0]['share_img'] = $share_imgclean;
				$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"savedTo\">" . ucfirst($fileteam) . " team details updated.</p>" : "There was an error updating the configuration.";
			} else {
				$data = explode("\n", $_POST['videos']);
				unset($config[0]['videos']);
				$i = 0;
				foreach ($data as $line) {
					$config[0]['videos'][$i] = trim($line);
					$i++;
				}
				$photos = explode("#",trim($_POST['photos']));
				$config[0]['gameid'] = trim($_POST['gameid']);
				$config[0]['photos'] = $photos[0];
				$config[0]['scribble'] = trim(str_replace('live.denverpost','mobile.scribblelive', $_POST['scribble']));
				$config[0]['boxscore'] = trim(str_replace('http://denverpost.sportsdirectinc.com','http://m.denverpost.sportsdirectinc.com', $_POST['boxscore']));
				$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"savedTo\">" . ucfirst($fileteam) . " Gametracker configuration updated!</p>" : "There was an error updating the configuration.";
			}

			$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"savedTo\">" . ucfirst($fileteam) . " Gametracker configuration updated!</p>" : "There was an error updating the configuration.";
		} ?>

<?php if (!$editdetails) { ?>
<h2>Updating the <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> gametracker</h2>
<p>Mostly you will only use this to add and remove media items. Don't change the top three configuration items if you're not sure what you're doing!</p>
<p><a href="index.php?team=<?php echo $fileteam; ?>&details=1">Edit team details</a> - DON'T TOUCH!</p>
<p>The News page on the Gametracker is pre-configured for each team, so no updates are possible.</p>

<form name="form1" method="post" action="index.php?team=<?php echo $fileteam; ?>&saving=1">
	<h3>GameID</h3>
	<p>This is parsed from the schedule feed and determines what game is presently in the Gametracker. DO NOT CHANGE IT IF YOU'RE NOT SURE!</p>
	<input type="text" name="gameid" cols="120" value="<?php echo $config[0]['gameid']; ?>">
	<h3>ScribbleLive</h3>
	<p>Paste in a link to the ScribbleLive on live.denverpost.com (it will be converted to mobile.scribblelive.com). Ex: http://live.denverpost.com/Event/Colorado_Avalanche_vs_Minnesota_Wild_Game_7_Live_Blog</p>
	<input type="text" name="scribble" cols="120" value="<?php echo $config[0]['scribble']; ?>">
	<h3>Boxscore</h3>
	<p>Paste in a link to the boxscore on denverpost.sportsdirectinc.com (it will be converted to m.denverpost.sportsdirectinc.com). Ex: http://denverpost.sportsdirectinc.com/hockey/nhl-boxscores.aspx?page=/data/NHL/results/2013-2014/boxscore63057.html</p>
	<input type="text" name="boxscore" cols="120" value="<?php echo $config[0]['boxscore']; ?>">
	<h3>Photos</h3>
	<p>Paste in a link to the game photo gallery on MediaCenter. Ex: http://photos.denverpost.com/2014/04/28/photos-colorado-avalanche-vs-minnesota-wild-game-6-of-stanley-cup-playoffs/</p>
	<input type="text" name="photos" cols="120" value="<?php echo $config[0]['photos']; ?>">
	<h3>Videos</h3>
	<p>You can add multiple videos to the videos tab:</p>
	<ul>
		<li><strong>Brightcove video:</strong> Use only the videoID &mdash; it should be a 13-digit number (deprecated).</li>
		<li><strong>Ooyala video:</strong> Use the video ID (not the player ID) &mdash; it should be a 32-character hexadecimal (alphanumeric) string.</li>
	</ul>
	<p>You can rearrange the order of the videos by changing the order in this list. They are displayed in the order they are listed.</p>
	<textarea id="styled" name="videos" cols="120" rows="5"><?php $media = (isset($config[0]['videos']) ) ? implode("\n",$config[0]['videos']) : ''; echo $media; ?></textarea>
	<input type="submit" value="Update Gametracker!"><?php echo $savedmessage; ?>
</form>

<p class="clear"><a href="index.php?team=<?php echo $fileteam; ?>">Refresh</a> | <a href="index.php">Pick a different team tracker</a></p>

<?php } else if ($editdetails) { ?>

<h2>Updating <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> team details</h2>
<p style="color:red">IF YOU DO NOT KNOW EXACTLY WHAT YOU ARE DOING, DO NOT TOUCH ANYTHING HERE. YOU RISK BREAKING NOT ONLY THE GAMETRACKER FOR THIS TEAM, BUT ALL GAMETRACKERS EVERYWHERE.</p>
<p>The world will mourn them and shun you if you fail.</p>
<p><a href="index.php?team=<?php echo $fileteam; ?>">GO BACK TO GAMETRACKER MEDIA EDITOR</a> (strongly recommended)</p>

<form name="form2" method="post" action="index.php?team=<?php echo $fileteam; ?>&details=1&saving=1">
	<h3>Team Name</h3>
	<p>Used to identify the team in SportsDirect feeds.</p>
	<input type="text" name="teamname" cols="120" value="<?php echo isset($config[0]['teamname']) ? $config[0]['teamname'] : ''; ?>">
	<h3>Team Nickname</h3>
	<p>Also used as a team identifier in some feeds ("mascot," esp for college teams).</p>
	<input type="text" name="nickname" cols="120" value="<?php echo isset($config[0]['nickname']) ? $config[0]['nickname'] : ''; ?>">
	<h3>Friendly name</h3>
	<p>Used to refer to the team in a friendly/colloquial way, i.e. "Avs," or "Buffs."</p>
	<input type="text" name="friendlyname" cols="120" value="<?php echo isset($config[0]['friendlyname']) ? $config[0]['friendlyname'] : ''; ?>">
	<h3>Shortname</h3>
	<p>Used as an identifier in SportsDirect feeds (yes, three ways of identifying teams).</p>
	<input type="text" name="shortname" cols="120" value="<?php echo isset($config[0]['shortname']) ? $config[0]['shortname'] : ''; ?>">
	<h3>Display shortname</h3>
	<p>Used as an alternate to display team shortname in live scores area (addresses "COLO" vs. "CU").</p>
	<input type="text" name="displayshort" cols="120" value="<?php echo isset($config[0]['displayshort']) ? $config[0]['displayshort'] : ''; ?>">
	<h3>Team color</h3>
	<p>Official team color, used for background of live scores area (#topper). Preferably the brightest color available from the teams colors, i.e. Orange for Broncos, Blue for Avalanche, Gold for CU, etc. Use Hex numeric color.</p>
	<input type="text" name="teamcolor" cols="120" value="<?php echo isset($config[0]['teamcolor']) ? $config[0]['teamcolor'] : ''; ?>">
	<h3>News keywords</h3>
	<p>Written into the news_keywords meta tag exactly as displayed here. Separate with a comma and a space for neatness.</p>
	<input type="text" name="news_keywords" cols="120" value="<?php echo isset($config[0]['news_keywords']) ? $config[0]['news_keywords'] : ''; ?>">
	<h3>Twitter creator</h3>
	<p>The twitter account that will be promoted in the Twitter Card code on the page -- usually @DPostSports. THe '@' is not required.</p>
	<input type="text" name="twitter_creator" cols="120" value="<?php echo isset($config[0]['twitter_creator']) ? $config[0]['twitter_creator'] : ''; ?>">
	<h3>Share image</h3>
	<p>The image that will be set for both og:image and twitter:image in the meta data. Must be 1200x630px. Must be a valid URL.</p>
	<input type="text" name="share_img" cols="120" value="<?php echo isset($config[0]['share_img']) ? $config[0]['share_img'] : ''; ?>">

	<input type="submit" value="Update team details"><?php echo $savedmessage; ?>
</form>

<p class="clear"><a href="index.php?team=<?php echo $fileteam; ?>">Refresh</a> | <a href="index.php">Pick a different team tracker</a></p>

<?php }
}
?>
</div>
</body>
</html>