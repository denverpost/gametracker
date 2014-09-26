<html>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include('../functions.php');

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

$config = get_config($fileteam);

if ($fileteam && !$editdetails) {
	$pagetitle = 'Editing '.ucfirst($config[0]['friendlyname']).' Game Details';
} else if ($fileteam && $editdetails) {
	$pagetitle = 'Editing '.ucfirst($config[0]['friendlyname']).' Team Details';
} else {
	$pagetitle = '';
}

?>
<head>
	<title><?php echo ($pagetitle != '') ? $pagetitle : 'Gametracker Editor'; ?> | Denver Post Gametracker</title>
	<link rel="stylesheet" type="text/css" href="//cdn.foundation5.zurb.com/foundation.css" />
	<link rel="stylesheet" type="text/css" href="./style.css" />
	<link rel="icon" href="http://extras.mnginteractive.com/live/media/favIcon/dpo/favicon.ico" type="image/x-icon" />
</head>

<body>
	<div id="wrapper">
		<?php

		if (!$fileteam) { ?>
		<!-- Show the team chooser -->
		<div class="headerstyle">
			<div class="row">
				<div class="large-12 columns">
					<h1>Gametracker Editor</h1>
					<p>Use this interface to update the details for each Gametracker instance and each team with a Gametracker.</p>
					<ul>
						<li>You should only need to update the Game Details with any frequency.</li>
						<li>The Team Details is to be avoided unless you are certain a problem exists there.</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="theforms" class="row">
			<div class="large-12 columns">
				<h4>Teams and Gametrackers available to edit:</h4>
				
				<form name="formchooser">
					<fieldset>
						<legend>Professional Football Teams</legend>
							<label>
								<div class="large-12 columns">
									<h4>Denver Broncos</h4>
								</div>
								<div class="large-4 columns">
									<a href="../broncos" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=broncos" class="button success large-12 columns">EDIT GAME DETAILS</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=broncos&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
								</div>
							</label>
					</fieldset>
					<fieldset>
						<legend>College Football Teams</legend>
							<label>
								<div class="large-12 columns">
									<h4>Colorado Buffaloes</h4>
								</div>
								<div class="large-4 columns">
									<a href="../cu" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=cu" class="button success large-12 columns">EDIT GAME DETAILS</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=cu&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
								</div>
							</label>
							<label>
								<div class="large-12 columns">
									<h4>Colorado State Rams</h4>
								</div>
								<div class="large-4 columns">
									<a href="../csu" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=csu" class="button success large-12 columns">EDIT GAME DETAILS</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=csu&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
								</div>
							</label>
					</fieldset>
					<fieldset>
						<legend>Professional Hockey Teams</legend>
							<label>
								<div class="large-12 columns">
									<h4>Colorado Avalanche</h4>
								</div>
								<div class="large-4 columns">
									<a href="../avs" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=avs" class="button success large-12 columns">EDIT GAME DETAILS</a>
								</div>
								<div class="large-4 columns">
									<a href="index.php?team=avs&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
								</div>
							</label>
					</fieldset>
				</form>
			</div>
		</div>
		
		<?php } else {

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
				$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"alert-box success radius\">" . $config[0]['teamname'] . ' ' . $config[0]['nickname'] . " team details updated.</p>" : "<p class=\"alert-box warning radius\">There was an error updating the team configuration.</p>";
			} else {
				$data = explode("\n", $_POST['videos']);
				unset($config[0]['videos']);
				$i = 0;
				foreach ($data as $line) {
					$config[0]['videos'][$i] = trim($line);
					$i++;
				}
				if (trim($_POST['gameid']) != trim($_POST['gameselect']) && trim($_POST['gameselect']) != 'noselect') {
					$gameid_final = trim($_POST['gameselect']);
				} else {
					$gameid_final = trim($_POST['gameid']);
				}
				$photos = explode("#",trim($_POST['photos']));
				$config[0]['gameid'] = $gameid_final;
				$config[0]['photos'] = $photos[0];
				$config[0]['scribble'] = trim(str_replace('live.denverpost','mobile.scribblelive', $_POST['scribble']));
				$config[0]['boxscore'] = trim(str_replace('http://denverpost.sportsdirectinc.com','http://m.denverpost.sportsdirectinc.com', $_POST['boxscore']));
				$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"alert-box success radius\">" . $config[0]['teamname'] . ' ' . $config[0]['nickname'] . " game details updated successfully!</p>" : "<p class=\"alert-box warning radius\">There was an error updating the game configuration.</p>";
			}

			$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"alert-box success radius\">" . ucfirst($fileteam) . " Gametracker configuration updated!</p>" : "<p class=\"alert-box warning radius\">There was an error updating the configuration.</p>";
		} ?>

<?php if (!$editdetails) { ?>
<!-- Show the regular game editor -->
<?php

$schedule = get_schedule();

?>

<div class="headerstyle">
	<div class="row">
		<div class="large-12 columns">
			<h1>Updating <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> game details</h1>
			<p>Here you can configure the live blog, boxscore URL, photo gallery and videos for the team's Gametracker during the game.</p>
			<p>Don't change any configuration items if you're not sure what you're doing!</p>
			<div class="row">
				<div class="large-4 columns">
					<a href="index.php" class="button large-12 columns">OTHER GAMETRACKERS</a>
				</div>
				<div class="large-4 columns">
					<a href="../<?php echo $fileteam; ?>" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
				</div>
				<div class="large-4 columns">
					<a href="index.php?team=<?php echo $fileteam; ?>&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="theforms" class="row">
	<div class="large-12 columns">
		<form name="form1" method="post" action="index.php?team=<?php echo $fileteam; ?>&saving=1">
			<?php if ($savedmessage != ''): ?>
					<?php echo $savedmessage; ?>
			<?php endif; ?>
			<fieldset>
				<legend>Game to track</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Game ID
							<input class="smallmargin" type="text" name="gameid" value="<?php echo isset($config[0]['gameid']) ? $config[0]['gameid'] : ''; ?>" />
						</label>
						<p class="helptext">Determines what score feed/game to track. <!--Should be automatic.--></p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Select from upcoming games
							<select name="gameselect" class="smallmargin">
								<option value="noselect" style="color:#888;">Select from upcoming games...</option>
								<?php

								foreach($schedule[$fileteam] as $games) {
									$selected = ($config[0]['gameid'] == $games['gameid']) ? ' selected' : '';
									echo '<option value="'.$games['gameid'].'"'.$selected.'>'.$games['us'].$games['vs'] . ' ('.$games['gametimepretty'].')</option>';
								}

								?>
							</select>
						</label>
						<p class="helptext">Use to override <!--automatic--> input on left.</p>
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
			<div class="row">
				<div class="large-6 columns">
					<a class="button large-12 columns" href="index.php?team=<?php echo $fileteam; ?>">RELOAD (REFRESH WITHOUT SAVING)</a>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="button large-12 columns" style="float:right;" value="Update game details" />
				</div>
			</div>
		</form>
	</div>
</div>

<?php } else if ($editdetails) { ?>
<!-- Show the team details editor -->

<div class="headerstyle">
	<div class="row">
		<div class="large-12 columns">
			<h1>Updating <?php echo $config[0]['teamname'] . ' ' . $config[0]['nickname']; ?> team details</h1>
			<p class="alert-box alert radius">HERE THERE BE DRAGONS: If you are not 100% positive that you know exactly what you are doing with any field in this form, do not touch it. In fact, don't touch anything here. Go back to the Game Details page. Messing up in here could not only break this team's Gametracker, but all Gametrackers everywhere. The world will mourn, and probably shun you if you fail.</p>
			<p>The details here are used to both identify the team (in several ways, because different feeds or parts of feeds refer to the same teams in several ways, and we might not want to use any of those ways to ultimately display the name) and to configure the team's page settings for color and SEO/SMO purposes.</p>
			<p>These are settings that should not normally change from game-to-game.</p>
			<div class="row">
				<div class="large-4 columns">
					<a href="index.php" class="button large-12 columns">OTHER GAMETRACKERS</a>
				</div>
				<div class="large-4 columns">
					<a href="../<?php echo $fileteam; ?>" target="_blank" class="button large-12 columns">VIEW LIVE GAMETRACKER</a>
				</div>
				<div class="large-4 columns">
					<a href="index.php?team=<?php echo $fileteam; ?>" class="button success large-12 columns">BACK TO GAME DETAILS</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="theforms" class="row">
	<div class="large-12 columns">
		<form name="form2" method="post" action="index.php?team=<?php echo $fileteam; ?>&details=1&saving=1">
			<?php if ($savedmessage != ''): ?>
					<?php echo $savedmessage; ?>
			<?php endif; ?>
			<fieldset>
				<legend>Team name variants</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Team Name
							<input class="smallmargin" type="text" name="teamname" value="<?php echo isset($config[0]['teamname']) ? $config[0]['teamname'] : ''; ?>" />
						</label>
						<p class="helptext">Used to identify the team in most SportsDirect feeds.</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Nickname
							<input class="smallmargin" type="text" name="nickname" value="<?php echo isset($config[0]['nickname']) ? $config[0]['nickname'] : ''; ?>" />
						</label>
						<p class="helptext">Used to identify team in feeds. ("mascot," esp. for colleges)</p>
					</div>
				</div>
				<div class="row">
						<div class="large-6 columns">
						<label class="biglabel">Friendly Name
							<input class="smallmargin" type="text" name="friendlyname" value="<?php echo isset($config[0]['friendlyname']) ? $config[0]['friendlyname'] : ''; ?>" />
						</label>
						<p class="helptext">Team's more familiar name/nickname, i.e. "Avs," "Buffs."</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Shortname
							<input class="smallmargin" type="text" name="shortname" value="<?php echo isset($config[0]['shortname']) ? $config[0]['shortname'] : ''; ?>" />
						</label>
						<p class="helptext">Another SportsDirect feed identifier.</p>
					</div>
				</div>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Display Name
							<input class="smallmargin" type="text" name="displayshort" value="<?php echo isset($config[0]['displayshort']) ? $config[0]['displayshort'] : ''; ?>" />
						</label>
						<p class="helptext">Used in case <i>shortname</i> is unusual, i.e. "COLO" sted "CU").</p>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Page configuration</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Team Color
							<input class="smallmargin" type="text" name="teamcolor" value="<?php echo isset($config[0]['teamcolor']) ? $config[0]['teamcolor'] : ''; ?>">
							<p class="helptext">Official team color for scores area. Pick the boldest one.</p>
						</label>
					</div>
					<div class="large-6 columns">
						<label class="biglabel <?php echo (!isset($config[0]['sport'])) ? ' error' : ''; ?>">Sport type (REQUIRED)
							<div class="row">
								<fieldset class="radiobox">
									<div class="large-6 columns">
										<label>
											<input type="radio" name="sporttype" value="football"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'football') ? ' checked' : ''; ?> /> Football</label>
									</div>
									<div class="large-6 columns">
										<label>
											<input type="radio" name="sporttype" value="hockey"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'hockey') ? ' checked' : ''; ?> /> Hockey</label>
									</div>
								</fieldset>
								<p class="helptext">What sport to parse scores data as. Mismatches mean disaster.</p>
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
			<div class="row">
				<div class="large-6 columns">
					<a class="button large-12 columns" href="index.php?team=<?php echo $fileteam; ?>&details=1">RELOAD (REFRESH WITHOUT SAVING)</a>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="button large-12 columns" style="float:right;" value="Update team details" />
				</div>
			</div>
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