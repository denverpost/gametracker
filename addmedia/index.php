<html>
<head>
	<title>Add Media | Denver Post Gametracker</title>

	<link rel="stylesheet" type="text/css" href="//cdn.foundation5.zurb.com/foundation.css" />
	<link rel="stylesheet" type="text/css" href="./style.css" />
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
			    $returns = false;
			} else {
				$returns = $image_url;
			}
			curl_close($handle);
			return $returns;
		}

		if (!$fileteam) { ?>
		
		<div class="row">
		<h1>Update Gametracker</h1>
		<p>Choose a team to update the gametracker for:</p>
		<ul>
			<li><a href="index.php?team=avs">Avalanche</a></li>
			<li><a href="index.php?team=broncos">Broncos</a></li>
			<li><a href="index.php?team=csu">CSU Rams</a></li>
			<li><a href="index.php?team=cu">CU Buffs</a></li>
		</ul>
		</div>
		
		<?php } else {

		$config = get_config($fileteam);

		$saving = (isset($_REQUEST['saving'])) ? $_REQUEST['saving'] : false;
		
		$imgerror = false;

		if ($saving == 1) {
			
			if ($editdetails == 1) {
				$share_imgclean = test_img_url(trim($_POST['share_img']));
				$imgerror = ($share_imgclean) ? false : true;
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
				$config[0]['sport'] = trim($_POST['sporttype']);
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

			$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"savedTo\">" . ucfirst($fileteam) . " Gametracker configuration updated!</p>" : "<p class=\"saveError\">There was an error updating the configuration.</p>";
		} ?>

<?php if (!$editdetails) { ?>
<div class="row">
	<div class="large-12 columns">
		<h2>Updating the <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> gametracker</h2>
		<p>Mostly you will only use this to add and remove media items. Don't change the top any configuration items if you're not sure what you're doing!</p>
		<p>The News page on the Gametracker is pre-configured for each team, so no updates are possible.</p>
		<p><a href="index.php?team=<?php echo $fileteam; ?>">Refresh</a> | <a href="index.php">Pick a different team tracker</a> | <a href="index.php?team=<?php echo $fileteam; ?>&details=1">Edit team details</a> <span style="color:red">- HERE THERE BE DRAGONS</span></p>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		<form name="form1" method="post" action="index.php?team=<?php echo $fileteam; ?>&saving=1">
			<?php if ($savedmessage != ''): ?>
				<fieldset>
					<?php echo $savedmessage; ?>
				</fieldset>
			<?php endif; ?>
			<fieldset>
				<legend>Game to track</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Game ID
							<input class="smallmargin" type="text" name="gameid" value="<?php echo isset($config[0]['gameid']) ? $config[0]['gameid'] : ''; ?>" />
						</label>
						<p class="helptext">Determines what score feed/game to track. Should be automatic.</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Select from upcoming games
							<select name="game" class="smallmargin">
								<option value="game1">game 1</option>
								<option value="game2">game 2</option>
								<option value="game3">game 3</option>
							</select>
						</label>
						<p class="helptext">Use to override automatic input in left.</p>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Non-feed game data</legend>
				<label class="biglabel<?php echo (!isset($config[0]['scribble']) || $config[0]['scribble'] == '') ? ' error' : ''; ?>">Live blog URL
					<input type="text" class="smallmargin" name="scribble" value="<?php echo isset($config[0]['scribble']) ? $config[0]['scribble'] : ''; ?>">
					<p class="helptext">Paste a valid link to the game live blog on live.denverpost.com. URL will be changed to mobile-friendly.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['boxscore']) || $config[0]['boxscore'] == '') ? ' error' : ''; ?>">Boxscore URL
					<input type="text" class="smallmargin" name="boxscore" value="<?php echo isset($config[0]['boxscore']) ? $config[0]['boxscore'] : ''; ?>">
					<p class="helptext">Paste a valid link to the boxscore on denverpost.sportsdirect.com. URL will be changed to mobile-friendly.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['photos']) || $config[0]['photos'] == '') ? ' error' : ''; ?>">Photo gallery URL
					<input type="text" class="smallmargin" name="photos" value="<?php echo isset($config[0]['photos']) ? $config[0]['photos'] : ''; ?>">
					<p class="helptext">Paste a valid link to the game or pre-game slideshow on photos.denverpost.com.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['videos']) || count($config[0]['videos']) == 0) ? ' error' : ''; ?>">Videos to embed
					<textarea name="videos" class="smallmargin" rows="5"><?php echo (isset($config[0]['videos']) ) ? implode("\n",$config[0]['videos']) : ''; ?></textarea>
					<p class="helptext">Ooyala video IDs (not player IDs!). Enter multiple videos on their own lines. Videos will be displayed in the order they are input.</p>
				</label>
			</fieldset>
			<input type="submit" class="button large-12 columns" style="float:right;" value="Update game details" />
		</form>
	</div>
</div>

<?php } else if ($editdetails) { ?>

<div class="row">
	<div class="large-12 columns">
		<h1>Updating <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> team details</h1>
		<p style="color:red">IF YOU DO NOT KNOW EXACTLY WHAT YOU ARE DOING, DO NOT TOUCH ANYTHING HERE. YOU RISK BREAKING NOT ONLY THE GAMETRACKER FOR THIS TEAM, BUT ALL GAMETRACKERS EVERYWHERE.</p>
		<p>The world will mourn them and shun you if you fail.</p>
		<p><a href="index.php?team=<?php echo $fileteam; ?>">GO BACK TO THE MEDIA EDITOR</a> (strongly recommended) | <a href="index.php?team=<?php echo $fileteam; ?>">Refresh</a> | <a href="index.php">Configure a different team</a></p>
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<form name="form2" method="post" action="index.php?team=<?php echo $fileteam; ?>&details=1&saving=1">
			<?php if ($savedmessage != ''): ?>
				<fieldset>
					<?php echo $savedmessage; ?>
				</fieldset>
			<?php endif; ?>
			<fieldset>
				<legend>Team name variants</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Team Name
							<input class="smallmargin" type="text" name="teamname" value="<?php echo isset($config[0]['teamname']) ? $config[0]['teamname'] : ''; ?>" />
						</label>
						<p class="helptext">Used to identify the team in SportsDirect feeds.</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Nickname
							<input class="smallmargin" type="text" name="nickname" value="<?php echo isset($config[0]['nickname']) ? $config[0]['nickname'] : ''; ?>" />
						</label>
						<p class="helptext">Used to identify team in feeds. (a.k.a. "mascot")</p>
					</div>
				</div>
				<div class="row">
						<div class="large-6 columns">
						<label class="biglabel">Friendly Name
							<input class="smallmargin" type="text" name="friendlyname" value="<?php echo isset($config[0]['friendlyname']) ? $config[0]['friendlyname'] : ''; ?>" />
						</label>
						<p class="helptext">Colloquial name, i.e. "Avs," "Buffs."</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Shortname
							<input class="smallmargin" type="text" name="shortname" value="<?php echo isset($config[0]['shortname']) ? $config[0]['shortname'] : ''; ?>" />
						</label>
						<p class="helptext">Another SportsDirect feed identified.</p>
					</div>
				</div>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Display Name
							<input class="smallmargin" type="text" name="displayshort" value="<?php echo isset($config[0]['displayshort']) ? $config[0]['displayshort'] : ''; ?>" />
						</label>
						<p class="helptext">Short name to display with scores.</p>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Page configuration</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Team Color
							<input class="smallmargin" type="text" name="teamcolor" value="<?php echo isset($config[0]['teamcolor']) ? $config[0]['teamcolor'] : ''; ?>">
							<p class="helptext">Official team color for scores area.</p>
						</label>
					</div>
					<div class="large-6 columns">
						<label class="biglabel <?php echo (!isset($config[0]['sport'])) ? ' error' : ''; ?>">Sport type (REQUIRED)
							<div class="row">
								<div class="large-6 columns">
									<label>
										<input type="radio" name="sporttype" value="football"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'football') ? ' checked' : ''; ?> /> Football</label>
								</div>
								<div class="large-6 columns">
									<label>
										<input type="radio" name="sporttype" value="hockey"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'hockey') ? ' checked' : ''; ?> /> Hockey</label>
								</div>
								<p class="helptext">What sport to parse scores data as.</p>
							</div>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Page Meta Options</legend>
				<label class="biglabel">Twitter Creator
					<input class="smallmargin" type="text" name="twitter_creator" value="<?php echo isset($config[0]['twitter_creator']) ? $config[0]['twitter_creator'] : ''; ?>" />
					<p class="helptext">The twitter account that will be promoted in the Twitter Card. '@' is not required.</p>
				</label>
				<label class="biglabel">Share Image
					<input class="smallmargin" type="text" name="share_img" value="<?php echo isset($config[0]['share_img']) ? $config[0]['share_img'] : ''; ?>" />
					<p class="helptext">Image to use for Facebook shares and Twitter cards. Must be 1200x630px. URL must be valid.</p>
				</label>
				<label class="biglabel<?php echo ($imgerror) ? ' error' : ''; ?>">News Keywords
					<textarea name="news_keywords" class="smallmargin"><?php echo isset($config[0]['news_keywords']) ? $config[0]['news_keywords'] : ''; ?></textarea>
					<p class="helptext">10 or more newsy SEO terms for the "news_keywords" meta tag, separated by commas.</p>
				</label>
			</fieldset>
			<input type="submit" class="button large-12 columns" style="float:right;" value="Update team details" />
		</form>
	</div>
</div>

<?php }
}
?>
</div>

<script type="text/javascript" href="//cdn.foundation5.zurb.com/foundation.js"></script>

</body>
</html>