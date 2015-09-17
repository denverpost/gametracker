<html>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include('../functions.php');

$fileteam = ( isset($_REQUEST['team']) && $_REQUEST['team'] == ('avs' || 'broncos' || 'rockies' || 'nuggets' || 'rapids' || 'cu' || 'csu') ) ? $_REQUEST['team'] : false;
$editdetails = (isset($_REQUEST['details'])) ? $_REQUEST['details'] : false;

if ($fileteam) { $config = get_config($fileteam); }

$titlename = '';
if ( isset($config[0]['friendlyname'])) {
	$titlename = ucfirst( $config[0]['friendlyname'] );
} else if ( isset( $_POST['friendlyname'] ) ) {
	$titlename = ucfirst( trim( $_POST['friendlyname'] ) );
}
if ($fileteam && !$editdetails) {
	$pagetitle = 'Editing '.$titlename.' Game Details';
} else if ($fileteam && $editdetails) {
	$pagetitle = 'Editing '.$titlename.' Team Details';
} else {
	$pagetitle = 'Denver Post Gametracker';
}

?>
<head>
	<title><?php echo ($pagetitle != '') ? $pagetitle : 'Gametracker Editor'; ?> | Denver Post Gametracker</title>
	<link rel="stylesheet" type="text/css" href="//cdn.foundation5.zurb.com/foundation.css" />
	<link rel="stylesheet" type="text/css" href="./style.css" />
	<link rel="icon" href="http://extras.mnginteractive.com/live/media/favIcon/dpo/favicon.ico" type="image/x-icon" />

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
	<script type="text/javascript" src="../js/modernizr.js"></script>
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
					<p class="changelink">What's new? <a href="#" data-reveal-id="changeLog">View the changelog</a></p>
				</div>
			</div>
		</div>
		<div id="theforms" class="row">
			<div class="large-12 columns">
				<h4>Teams and Gametrackers available to edit:</h4>
				
				<form name="formchooser">
					<fieldset>
						<legend>Professional Football (NFL)</legend>
							<label>
								<div class="row">
									<div class="large-4 columns">
										<img src="../broncos/img/logo-den.png" class="editorimg" style="width:19%;" />
										<h4>Denver Broncos</h4>
									</div>
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">
												<a href="../broncos" target="_blank" class="button large-12 columns">LIVE GAMETRACKER</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=broncos" class="button success large-12 columns">EDIT GAME DETAILS</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=broncos&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
											</div>
										</div>
									</div>
								</div>
							</label>
					</fieldset>
					<fieldset>
						<legend>College Football (NCAAF)</legend>
							<label>
								<div class="row">
									<div class="large-4 columns">
										<img src="../cu/img/logo-colo.png" class="editorimg" />
										<h4>Colorado Buffaloes</h4>
									</div>
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">
												<a href="../cu" target="_blank" class="button large-12 columns">LIVE GAMETRACKER</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=cu" class="button success large-12 columns">GAME DETAILS</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=cu&details=1" class="button alert large-12 columns">TEAM DETAILS</a>
											</div>
										</div>
									</div>
								</div>
							</label>
							<label>
								<div class="row">
									<div class="large-4 columns">
										<img src="../csu/img/logo-csu.png" class="editorimg" />
										<h4>Colorado State Rams</h4>
									</div>
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">
												<a href="../csu" target="_blank" class="button large-12 columns">LIVE GAMETRACKER</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=csu" class="button success large-12 columns">GAME DETAILS</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=csu&details=1" class="button alert large-12 columns">TEAM DETAILS</a>
											</div>
										</div>
									</div>
								</div>
							</label>
					</fieldset>
					<fieldset>
						<legend>Professional Hockey (NHL)</legend>
							<label>
								<div class="row">
									<div class="large-4 columns">
										<img src="../avs/img/logo-col.png" class="editorimg" />
										<h4>Colorado Avalanche</h4>
									</div>
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">
												<a href="../avs" target="_blank" class="button large-12 columns">LIVE GAMETRACKER</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=avs" class="button success large-12 columns">GAME DETAILS</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=avs&details=1" class="button alert large-12 columns">TEAM DETAILS</a>
											</div>
										</div>
									</div>
								</div>
							</label>
					</fieldset>
					<fieldset>
						<legend>Professional Basketball (NBA)</legend>
							<label>
								<div class="row">
									<div class="large-4 columns">
										<img src="../nuggets/img/logo-den.png" class="editorimg" />
										<h4>Denver Nuggets</h4>
									</div>
									<div class="large-8 columns">
										<div class="row">
											<div class="large-4 columns">
												<a href="../nuggets" target="_blank" class="button large-12 columns">LIVE GAMETRACKER</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=nuggets" class="button success large-12 columns">EDIT GAME DETAILS</a>
											</div>
											<div class="large-4 columns">
												<a href="index.php?team=nuggets&details=1" class="button alert large-12 columns">EDIT TEAM DETAILS</a>
											</div>
										</div>
									</div>
								</div>
							</label>
					</fieldset>
				</form>
			</div>
		</div>

		<div id="changeLog" class="reveal-modal" data-reveal>
			<div class="changelog">
				<h2>Changelog</h2>
				<?php include('../changelog.html'); ?>
				<a class="close-reveal-modal" aria-label="Close">&#215;</a>
			</div>
		</div>
		
		<?php } else {

		$saving = (isset($_REQUEST['saving'])) ? $_REQUEST['saving'] : false;

		if ($saving == 1) {
			
			if ($editdetails == 1) {
				$share_imgclean = test_url($_POST['share_img']);
				$imgerror = ($share_imgclean) ? false : true;
				$twitter_creatorclean = ltrim(trim($_POST['twitter_creator']),'@');
				$scores_urlclean = clean_xml_url($_POST['scores_url']);
				$feederror = (!$scores_urlclean) ? true : false;
				$config[0]['teamname'] = ucfirst(trim($_POST['teamname']));
				$config[0]['nickname'] = ucfirst(trim($_POST['nickname']));
				$config[0]['shortname'] = strtoupper(trim($_POST['shortname']));
				$config[0]['friendlyname'] = ucfirst(trim($_POST['friendlyname']));
				$config[0]['displayshort'] = strtoupper(trim($_POST['displayshort']));
				$config[0]['teamcolor'] = str_replace('#','',trim($_POST['teamcolor']));
				$config[0]['adsenabled'] = (isset($_POST['adsenabled'])) ? $_POST['adsenabled'] : false;
				$config[0]['news_keywords'] = rtrim(trim($_POST['news_keywords']),',');
				$config[0]['page_title'] = trim($_POST['page_title']);
				$config[0]['meta_description'] = trim($_POST['meta_description']);
				$config[0]['twitter_title'] = trim($_POST['twitter_title']);
				$config[0]['twitter_description'] = trim($_POST['twitter_description']);
				$config[0]['twitter_creator'] = $twitter_creatorclean;
				$config[0]['fb_title'] = trim($_POST['fb_title']);
				$config[0]['fb_description'] = trim($_POST['fb_description']);
				$config[0]['share_img'] = $share_imgclean;
				$config[0]['sport'] = trim($_POST['sporttype']);
				$config[0]['league'] = trim($_POST['league']);
				$config[0]['scores_url'] = $scores_urlclean;
				$config[0]['season'] = get_football_season(trim($_POST['sporttype']));
				$success = (!$imgerror && !$feederror) ? 'success ' : 'warning ';
				$warnmsg = ($success == 'warning ') ? ', with errors' : '';
				$savedmessage = (put_config($fileteam,$config)) ? '<p class="alert-box '.$success.'radius">' . $config[0]['teamname'] . ' ' . $config[0]['nickname'] . ' team details updated'.$warnmsg.'.</p>' : '<p class="alert-box alert radius">There was an error updating the team configuration.</p>';
				$warningmessage = ($imgerror) ? '<p class="alert-box warning radius">The Share Image URL was not provided or was invalid.</p>' : '';
				$warningmessage .= ($feederror) ? '<p class="alert-box warning radius">The Scores Feed URL was not provided or was invalid.</p>' : '';
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
				$config[0]['gameid'] = $gameid_final;
				if ( isset($_POST['boxedit']) ) {
					if ( $_POST['boxedit'] == 'true' ) {
						$config[0]['boxedit'] = $_POST['boxedit'];
						$boxscore_clean = trim(str_replace('http://denverpost.sportsdirectinc.com','http://m.denverpost.sportsdirectinc.com', $_POST['boxscore']));
					} else {
						$config[0]['boxedit'] = false;
					}
				} else {
					$boxscore_clean = boxscore_url($config[0]);
				}
				$photos = explode("#",trim($_POST['photos']));
				$commentid_clean = (trim($_POST['commentid']) > 1000000 && trim($_POST['commentid']) < 99999999) ? trim($_POST['commentid']) : false;
				$config[0]['commentid'] = $commentid_clean;
				$config[0]['photos'] = $photos[0];
				$config[0]['scribble'] = trim(str_replace('live.denverpost','mobile.scribblelive', $_POST['scribble']));
				$config[0]['boxscore'] = $boxscore_clean;
				$success = (!$gameid_final || !$commentid_clean) ? 'warning ' : 'success ';
				$warnmsg = ($success == 'warning ') ? ', with errors' : '';
				$savedmessage = (put_config($fileteam,$config)) ? "<p class=\"alert-box ".$success."radius\">" . $config[0]['teamname'] . ' ' . $config[0]['nickname'] . " game details updated".$warnmsg.".</p>" : "<p class=\"alert-box alert radius\">There was an error updating the game configuration.</p>";
				$warningmessage = (!$gameid_final) ? '<p class="alert-box warning radius">The Gametracker will not work without a valid Game ID.</p>' : '';
				$warningmessage .= (!$commentid_clean) ? '<p class="alert-box warning radius">The commenting article ID entered was invalid.</p>' : '';
			}
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
			<?php if (isset($savedmessage) && $savedmessage != ''): ?>
					<?php echo $savedmessage; ?>
			<?php endif; ?>
			<?php if (isset($warningmessage) && $warningmessage != ''): ?>
					<?php echo $warningmessage; ?>
			<?php endif; ?>
			<fieldset>
				<legend>Game to track</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel<?php echo (!isset($config[0]['gameid']) || $config[0]['gameid'] == '') ? ' error' : ''; ?>">Game ID
							<input class="smallmargin" type="text" name="gameid" id="gameid" value="<?php echo isset($config[0]['gameid']) ? $config[0]['gameid'] : ''; ?>" readonly />
						</label>
						<p class="helptext">This is the game currently being tracked. To update, select a game from the dropdown. <!--Should be automatic.--> <a href="javascript:editGameId();" tabindex="-1"><b>Click here to edit directly</b></a>.</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel">Select from upcoming games
							<select name="gameselect" id="gameidselect" class="smallmargin">
								<option value="noselect" style="color:#888;">Select from upcoming games...</option>
								<?php

								foreach($schedule[$fileteam] as $games) {
									$selected = ($config[0]['gameid'] == $games['gameid']) ? ' selected' : '';
									echo '<option value="'.$games['gameid'].'"'.$selected.'>'.$games['us'].$games['vs'] . ' ('.$games['gametimepretty'].')</option>';
								}

								?>
							</select>
						</label>
						<p class="helptext">Select the game to track from a list. This auto-updates the field on the left.</p>
					</div>
					<div class="large-12 columns">
						<label class="biglabel<?php echo (!isset($config[0]['scores_url']) || !isset($config[0]['gameid'])) ? ' error' : ''; ?>">Game Details Feed URL
							<input type="text" class="smallmargin" id="boxscore" name="boxscore" value="<?php echo ( isset($config[0]['scores_url']) && isset($config[0]['gameid']) ) ? sprintf( $config[0]['scores_url'], $config[0]['gameid']) : ''; ?>" readonly />
							<p class="helptext">This is the feed URL being used to power this Gametracker right now. <?php echo ( isset($config[0]['scores_url']) && isset($config[0]['gameid']) ) ? sprintf('<a href="%1$s" target="_blank"><b>Click here to check the livescores feed</b></a>.', sprintf( $config[0]['scores_url'],$config[0]['gameid']) ) : ''; ?></p>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Non-feed game data</legend>
				<label class="biglabel<?php echo (!isset($config[0]['scribble']) || $config[0]['scribble'] == '') ? ' error' : ''; ?>">Live blog URL
					<input type="text" class="smallmargin" name="scribble" value="<?php echo isset($config[0]['scribble']) ? $config[0]['scribble'] : ''; ?>" />
					<p class="helptext">Paste a valid link to the game live blog on live.denverpost.com. URL will be changed to mobile-friendly.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['commentid']) || $config[0]['commentid'] == '') ? ' error' : ''; ?>">Comments Article ID
					<input type="text" class="smallmargin" name="commentid" value="<?php echo isset($config[0]['commentid']) ? $config[0]['commentid'] : ''; ?>" />
					<p class="helptext">Article ID for the NGPS story to show Disqus comments from.</p>
				</label>
				<div class="row">
					<div class="large-10 columns">
						<label class="biglabel<?php echo (!isset($config[0]['boxscore']) || $config[0]['boxscore'] == '') ? ' error' : ''; ?>">Boxscore URL
							<input type="text" class="smallmargin" id="boxscore" name="boxscore" value="<?php echo isset($config[0]['boxscore']) ? $config[0]['boxscore'] : ''; ?>" readonly />
							<p class="helptext">Based on sport, league, year and Game ID; updates automatically unless overridden (checkbox at right). Reverts to automatic if you uncheck Override and then hit Update.</p>
						</label>
					</div>
					<div class="large-2 columns">
						<label class="biglabel">Override
							<div class="row">
								<fieldset class="radiobox">
									<div class="large-12 columns">
										<label>
											<input class="smallmargin" type="checkbox" name="boxedit" id="boxedit" value="true" <?php echo (isset($config[0]['boxedit']) && $config[0]['boxedit']) ? 'checked' : ''; ?> /> Override
										</label>
									</div>
								</fieldset>
							</div>
						</label>
					</div>
				</div>
				<label class="biglabel<?php echo (!isset($config[0]['photos']) || $config[0]['photos'] == '') ? ' error' : ''; ?>">Photo gallery URL
					<input type="text" class="smallmargin" name="photos" value="<?php echo isset($config[0]['photos']) ? $config[0]['photos'] : ''; ?>" />
					<p class="helptext">Paste a valid link to the game or pre-game slideshow on photos.denverpost.com.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['videos']) || count($config[0]['videos']) == 0) ? ' error' : ''; ?>">Videos to embed
					<textarea name="videos" class="smallmargin" rows="5"><?php echo (isset($config[0]['videos']) ) ? implode("\n",$config[0]['videos']) : ''; ?></textarea>
					<p class="helptext">Enter video IDs (not player IDs!) on their own lines. Videos will be displayed in the order they are input.</p>
					<p class="helptext">Currently supports Ooyala (32-character ID), Brightcove (13), Youtube (11), NDN (8) and Tout (6). <a href="#" data-reveal-id="videoHelp">How to find the video ID you need</a></p>
				</label>
			</fieldset>
			<div class="row">
				<div class="large-6 columns">
					<a class="button info large-12 columns" href="index.php?team=<?php echo $fileteam; ?>">RELOAD (REFRESH WITHOUT SAVING)</a>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="button large-12 columns" style="float:right;" value="Update game details" />
				</div>
			</div>
		</form>
	</div>
</div>

<div id="videoHelp" class="reveal-modal" data-reveal>
	<h2>How to find video IDs</h2>
	<p class="lead">Grab the embed code and lift the ID (highlighted) from that. Here are some examples:</p>
	<h4>Tout:</h4>
	<code class="prettyprint lang-html">
	&lt;iframe width="420" height="315" frameborder="0" id="tout_embed" src="//www.tout.com/embed/touts/<b>u3yveg</b>"&gt;&lt;/iframe&gt;
	</code>
	<h4>YouTube:</h4>
	<code class="prettyprint lang-html">
	&lt;iframe width="560" height="315" src="//www.youtube.com/embed/<b>fXT23fh99OM</b>" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;
	</code>
	<h4>NDN:</h4>
	<code class="prettyprint lang-html">
	&lt;div class="ndn_embed" style="width:654px;height:368px;" data-config-widget-id="2" data-config-type="VideoPlayer/Single" data-config-tracking-group="90115" data-config-video-id="<b>27361955</b>" data-config-site-section="denverpost2se"&gt;&lt;/div&gt;
	</code>
	<h4>Ooyala:</h4>
	<code class="prettyprint lang-html">
	&lt;script height="100%" width="100%" src="http://player.ooyala.com/iframe.js #pbid=fce2cf476df14253a15351f1727031b4&ec=<b>hxNG5mazoHMPXtXR_SXeyYOavxtHis0f</b>"&gt;&lt;/script&gt;
	</code>
	<a class="close-reveal-modal">&#215;</a>
</div>

<script type="text/javascript">
function editGameId() {
	$('input#gameid').removeAttr('readonly');
}
$('#gameidselect').on('change',function(){
	if ($('#gameidselect option:selected').val() != 'noselect') {
		$('input#gameid').val($('#gameidselect option:selected').val());
	}
});
$('#boxedit').on('change',function(){
	$('input#boxscore').removeAttr('readonly');
});
</script>

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
			<?php if (isset($savedmessage) && $savedmessage != ''): ?>
					<?php echo $savedmessage; ?>
			<?php endif; ?>
			<?php if (isset($warningmessage) && $warningmessage != ''): ?>
					<?php echo $warningmessage; ?>
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
					<div class="large-6 columns">
						<label class="biglabel">Team Logo
							<div class="row">
								<div class="large-9 columns">
									<input class="smallmargin" type="text" name="teamlogo" value="logo-<?php echo strtolower($config[0]['shortname']); ?>.png" readonly />
									<p class="helptext">(Non-editable)</p>
								</div>
								<div class="large-3 columns">
									<img src="../<?php echo strtolower($fileteam); ?>/img/logo-<?php echo strtolower($config[0]['shortname']); ?>.png" height="40" style="margin:-8 auto 0;display:block;"/>
								</div>
							</div>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Page configuration</legend>
				<div class="row">
					<div class="large-3 columns">
						<label class="biglabel">Team Color
							<input class="smallmargin" type="text" name="teamcolor" value="<?php echo isset($config[0]['teamcolor']) ? $config[0]['teamcolor'] : ''; ?>">
							<p class="helptext">Official team color for scores area. Pick the boldest one.</p>
						</label>
					</div>
					<div class="large-6 columns">
						<label class="biglabel<?php echo (!isset($config[0]['sport']) || $config[0]['sport'] == '') ? ' error' : ''; ?>">Sport type (REQUIRED)
							<div class="row">
								<fieldset class="radiobox">
									<div class="large-4 columns">
										<label>
											<input type="radio" name="sporttype" value="football"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'football') ? ' checked' : ''; ?> /> Football</label>
									</div>
									<div class="large-4 columns">
										<label>
											<input type="radio" name="sporttype" value="hockey"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'hockey') ? ' checked' : ''; ?> /> Hockey</label>
									</div>
									<div class="large-4 columns">
										<label>
											<input type="radio" name="sporttype" value="basketball"<?php echo (isset($config[0]['sport']) && $config[0]['sport'] == 'basketball') ? ' checked' : ''; ?> /> Basketball</label>
									</div>
								</fieldset>
								<p class="helptext">What sport to parse scores data as. Mismatches mean disaster.</p>
							</div>
						</label>
					</div>
					<div class="large-3 columns">
						<label class="biglabel">Advertising
							<div class="row">
								<fieldset class="radiobox">
									<div class="large-12 columns">
										<label>
											<input class="smallmargin" type="checkbox" name="adsenabled" id="adsenabled" value="true" <?php echo (isset($config[0]['adsenabled']) && $config[0]['adsenabled']) ? 'checked' : ''; ?> disabled /> Display ads
										</label>
									</div>
								</fieldset>
							</div>
							<p class="helptext">Whether Ads are enabled on this Gametracker. Do not change without explicit instructions. <a href="javascript:editAds();" tabindex="-1"><b>Click to edit</b></a>.</p>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Season and League</legend>
				<div class="row">
					<div class="large-6 columns">
						<label class="biglabel">Current season
							<input class="smallmargin" type="text" name="season" value="<?php echo isset($config[0]['season']) ? $config[0]['season'] : ''; ?>" readonly />
						</label>
						<p class="helptext">The current season being tracked. Updated automatically when this page is saved.</p>
					</div>
					<div class="large-6 columns">
						<label class="biglabel<?php echo (!isset($config[0]['league']) || $config[0]['league'] == '') ? ' error' : ''; ?>">League
							<div class="row">
								<fieldset class="radiobox">
									<div class="large-3 columns">
										<label>
											<input type="radio" name="league" value="NFL"<?php echo (isset($config[0]['league']) && $config[0]['league'] == 'NFL') ? ' checked' : ''; ?> /> NFL</label>
									</div>
									<div class="large-3 columns">
										<label>
											<input type="radio" name="league" value="NCAAF"<?php echo (isset($config[0]['league']) && $config[0]['league'] == 'NCAAF') ? ' checked' : ''; ?> /> NCAAF</label>
									</div>
									<div class="large-3 columns">
										<label>
											<input type="radio" name="league" value="NHL"<?php echo (isset($config[0]['league']) && $config[0]['league'] == 'NHL') ? ' checked' : ''; ?> /> NHL</label>
									</div>
									<div class="large-3 columns">
										<label>
											<input type="radio" name="league" value="NBA"<?php echo (isset($config[0]['league']) && $config[0]['league'] == 'NBA') ? ' checked' : ''; ?> /> NBA</label>
									</div>
								</fieldset>
								<p class="helptext">What league to fetch scores data from. Mismatches are bad.</p>
							</div>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Page Meta Options</legend>
				<label class="biglabel<?php echo (!isset($config[0]['page_title']) || $config[0]['page_title'] == '') ? ' error' : ''; ?>">Page Title
					<input class="smallmargin" type="text" name="page_title" value="<?php echo isset($config[0]['page_title']) ? $config[0]['page_title'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;title&gt;</b> tag in the page (used by Google and browser tabs).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['meta_description']) || $config[0]['meta_description'] == '') ? ' error' : ''; ?>">Meta Description
					<input class="smallmargin" type="text" name="meta_description" value="<?php echo isset($config[0]['meta_description']) ? $config[0]['meta_description'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;meta name="description" ... &gt;</b> tag (used by search engines).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['twitter_title']) || $config[0]['twitter_title'] == '') ? ' error' : ''; ?>">Twitter Title
					<input class="smallmargin" type="text" name="twitter_title" value="<?php echo isset($config[0]['twitter_title']) ? $config[0]['twitter_title'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;twitter:title&gt;</b> tag (used by Twitter Card previews).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['twitter_description']) || $config[0]['twitter_description'] == '') ? ' error' : ''; ?>">Twitter Description
					<input class="smallmargin" type="text" name="twitter_description" value="<?php echo isset($config[0]['twitter_description']) ? $config[0]['twitter_description'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;twitter:description&gt;</b> tag (used by Twitter Card previews).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['twitter_creator']) || $config[0]['twitter_creator'] == '') ? ' error' : ''; ?>">Twitter Creator
					<input class="smallmargin" type="text" name="twitter_creator" value="<?php echo isset($config[0]['twitter_creator']) ? $config[0]['twitter_creator'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;twitter:creator&gt;</b> tag in the page (used by Twitter Card previews).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['fb_title']) || $config[0]['fb_title'] == '') ? ' error' : ''; ?>">Facebook Title
					<input class="smallmargin" type="text" name="fb_title" value="<?php echo isset($config[0]['fb_title']) ? $config[0]['fb_title'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;og:title&gt;</b> tag (used by Facebook Link previews).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['fb_description']) || $config[0]['fb_description'] == '') ? ' error' : ''; ?>">Facebook Description
					<input class="smallmargin" type="text" name="fb_description" value="<?php echo isset($config[0]['fb_description']) ? $config[0]['fb_description'] : ''; ?>" />
					<p class="helptext">Value to fill in for the <b>&lt;og:description&gt;</b> tag in the page (used by Facebook Link previews).</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['share_img']) || $config[0]['share_img'] == '') ? ' error' : ''; ?>">Share Image
					<input class="smallmargin" type="text" name="share_img" value="<?php echo isset($config[0]['share_img']) ? $config[0]['share_img'] : ''; ?>" />
					<p class="helptext">Image to use for Facebook shares and Twitter cards. Must be 1200x630px and a valid URL. <a href="../gametracker-fb-image-template.psd"><b>Click to download the Photoshop template</b></a>.</p>
				</label>
				<label class="biglabel<?php echo (!isset($config[0]['news_keywords']) || $config[0]['news_keywords'] == '') ? ' error' : ''; ?>">News Keywords
					<textarea name="news_keywords" class="smallmargin"><?php echo isset($config[0]['news_keywords']) ? $config[0]['news_keywords'] : ''; ?></textarea>
					<p class="helptext">10 or more newsy SEO terms for the "news_keywords" meta tag, separated by commas.</p>
				</label>
			</fieldset>
			<fieldset>
				<legend>Really Technical Stuff</legend>
				<label class="biglabel<?php echo (!isset($config[0]['scores_url']) || $config[0]['scores_url'] == '') ? ' error' : ''; ?>">Livescores Feed URL
					<input class="smallmargin" type="text" name="scores_url" id="scores_url" value="<?php echo isset($config[0]['scores_url']) ? $config[0]['scores_url'] : ''; ?>"<?php echo (!isset($config[0]['scores_url']) || $config[0]['scores_url'] == '') ? '' : ' readonly'; ?> />
					<p class="helptext">The complete livescores feed URL to use, with '%s' replacing the Game ID. This is required for the Gametracker to work. <?php if (isset($config[0]['scores_url']) && $config[0]['scores_url'] != '') { ?><a href="javascript:editLiveUrl();" tabindex="-1"><b>Click to edit</b></a>.<?php } ?></p>
				</label>
			</fieldset>
			<div class="row">
				<div class="large-6 columns">
					<a class="button info large-12 columns" href="index.php?team=<?php echo $fileteam; ?>&details=1">RELOAD (REFRESH WITHOUT SAVING)</a>
				</div>
				<div class="large-6 columns">
					<input type="submit" class="button large-12 columns" style="float:right;" value="Update team details" />
				</div>
			</div>
		</form>
	</div>
</div>


<script type="text/javascript">
function editLiveUrl() {
	$('input#scores_url').removeAttr('readonly');
}
function editAds() {
	$('input#adsenabled').removeAttr('disabled');
}
</script>

<?php }
}
?>
</div>

<script type="text/javascript" src="../js/foundation.min.js"></script>
<script>
	$(document).foundation();
	$(document).ready(function(){
		if (location.hash == '#changelog') {
			$('#changeLog').foundation('reveal', 'open');
		}
	});
	
</script>

</body>
</html>