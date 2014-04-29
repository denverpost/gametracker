<html>
<head>
<title>Add Media | Denver Post Gametracker</title>
<style type="text/css">
p.savedTo { color:#dd0000; font-size:20px; float:left; padding-left:20px; margin-top:15px; margin-bottom: 0; }
p.clear { clear:both;padding-top:10px; }
h2 { font-size:32px; color:#444499; font-family: 'Helvetica','Arial',sans-serif; margin:15px 0; }
p,ul { font-size:22px; color:#181818; line-height:1.25; margin:0 10px 10px; }
ul li { margin:0 0 6px; font-size:20px; }
textarea#styled { font-size:16px; color:#292929; font-family:'Courier New',monospace; line-height:1.2; padding:5px; }
input[type="submit"] { margin-top:10px; float:left; width:150px; font-size:14px; line-height:1.2; height:32px; }
</style>
</head>

<body> 
<?php
  $fileteam = ( $_REQUEST['team'] == ('avs' || 'broncos') ) ? $_REQUEST['team'] : false;

  if (!$fileteam) { ?>
  
  <h2>Add media to the gametracker</h2>
  <p>Choose a team to update the media for:</p>
  <ul>
    <li><a href="index.php?team=avs">Avalanche</a></li>
    <li><a href="index.php?team=broncos">Broncos</a></li>
  </ul>

  <?php } else {

  $saving = $_REQUEST['saving'];
  if ($saving == 1) {
    $data = $_POST['data'];
    $file = "../".$fileteam."/media.txt";
 
    $fp = fopen($file, "w") or die("Couldn't open $file for writing!");
    fwrite($fp, $data) or die("Couldn't write values to file!");
 
    fclose($fp);
    $savedmessage = "<p class=\"savedTo\">Saved to $file successfully!</p>";
  }
?>

<h2>Add media to the <?php echo ucfirst($fileteam); ?> gametracker</h2>
<p>Add media items to be displayed in the gametracker here. What to add:</p>
<ul>
  <li><strong>Photo galleries:</strong> Use the full URL, without the photo number (#1) on the end.</li>
  <li><strong>Brightcove video:</strong> Use only the videoID &mdash; it should be a 13-digit number.</li>
  <li><strong>Ooyala video:</strong> Use the player ID or video ID &mdash; it should be a long hexadecimal (alphanumeric) string.</li>
</ul>
<p>You can rearrange the order of the items by changing the order in this list. The items are displayed in the order they are listed.</p>

<form name="form1" method="post" action="index.php?team=<?php echo $fileteam; ?>&saving=1">
  <textarea id="styled" name="data" cols="120" rows="16"><?php
    $file = "../".$fileteam."/media.txt";
    if (!empty($file)) {  
      $file = file_get_contents("$file");
      echo $file;  
    }  
  ?></textarea>
  <br>
  <input type="submit" value="Update media!"><?php echo $savedmessage; ?>
</form>

<p class="clear"><a href="index.php?team=<?php echo $fileteam; ?>">Refresh</a></p>

<?php }
?>
</body>
</html>