<?php
  $saving = $_REQUEST['saving'];
  if ($saving == 1) {
    $data = $_POST['data'];
    $file = "../broncos/media.txt";
 
    $fp = fopen($file, "w") or die("Couldn't open $file for writing!");
    fwrite($fp, $data) or die("Couldn't write values to file!");
 
    fclose($fp);
    echo "Saved to $file successfully!";
  }
?>

<br />
<h2>Add media to the gametracker</h2>
<p>Add the URLs of photo galleries or the videoIDs of Brightcove videos to add it to the media page on the Broncos gametracker.</p>
<p>You can rearrange the order of the items by changing the order in this list. The items are displayed in the order they are listed.</p>

<form name="form1" method="post" action="index.php?saving=1">
  <textarea name="data" cols="100" rows="10"><?php
    $file = "../broncos/media.txt";
    if (!empty($file)) {  
      $file = file_get_contents("$file");
      echo $file;  
    }  
  ?></textarea>
  <br>
  <input type="submit" value="Save">
</form>