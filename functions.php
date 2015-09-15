<?php
date_default_timezone_set('America/Denver');
if (!function_exists('get_team'))
{
	//gets the team being requested from the URL
	function get_team() {
		$team_name = end( array_filter( explode( '/', trim( strtok( $_SERVER['REQUEST_URI'], '?' ) ) ) ) );
		return $team_name;
	}
}
if (!function_exists('get_config'))
{
	//gets and individual team's config file and returns its data as an array
	function get_config($teamdir)
	{
		$configs = json_decode(file_get_contents('../'.$teamdir.'/config.json'),true);
		return $configs;
	}
}
if (!function_exists('put_config'))
{
	//writes a team's config file
	function put_config($teamdir,$configin)
	{
		file_put_contents('../'.$teamdir.'/config.json', json_encode($configin)) or die("Couldn't open $teamdir config for writing!");
		return get_config($teamdir);
	}
}
if (!function_exists('get_schedule'))
{
	//grabs the schedule data
	function get_schedule()
	{
		$sched = json_decode(file_get_contents('../schedule.json'),true);
		return $sched;
	}
}
if (!function_exists('put_schedule'))
{
	//writes schedule data
	function put_schedule($configin)
	{
		file_put_contents('../schedule.json', json_encode($configin)) or die("Couldn't open schedule.json for writing!");
		return true;
	}
}
if (!function_exists('simplexml_insert_after'))
{
	//inserts a SimpleXML DOM element after the specific element
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
}
if (!function_exists('test_url'))
{
	//tests a URL to make sure it gets a 200 status; returns the URL if true
	function test_url($url)
	{
		$url = trim($url);
		if (filter_var($url,FILTER_VALIDATE_URL))
		{
		    $headers = get_headers($url);
		    if (substr($headers[0], 9, 3) == '200')
		    {
		    	return $url;
		    } else {
		    	return false;
		    }
		} else {
			return false;
		}
	}
}
if (!function_exists('clean_xml_url'))
{
	//tests a URL to make sure it gets a 200 status; returns the URL if true
	function clean_xml_url($url)
	{
		$url = trim($url);
	    if (filter_var($url, FILTER_VALIDATE_URL))
	    {
	    	$urlparts = parse_url($url);
	    	if ( ($urlparts['scheme'] == 'http' || $urlparts['scheme'] == 'http') && (substr($urlparts['path'],-4,4) == '.xml') && $urlparts['host'] == 'xml.sportsdirectinc.com' )
	    	{
	    		return $url;
		    } else {
		    	return false;
		    }
	    } else {
	    	return false;
	    }
	}
}
if (!function_exists('get_next_game'))
{
	function get_next_game($teamschedule,$team,$date,$offset)
	{
		$teamsched = $teamschedule[$team]; //gets entries for one team only
		//sorts array by value of 'gametimeunix' key
		usort($teamsched, function($a, $b) {
		    return $a['gametimeunix'] - $b['gametimeunix'];
		});
		//checks array items, in order, for a time that is less than $offset seconds in the future
		foreach($teamsched as $gt) {
			if (($gt['gametimeunix'] - $offset) < ($date)) 
			{
				return $gt;
			}
		}
	}
}
if (!function_exists('get_football_season'))
{
	function get_football_season($sport)
	{
		$curryear = date("Y");
		$currmon = date("n");
		switch ($sport) {
			case 'hockey':
				$offset = 6;
				break;
			case 'basketball':
				$offset = 6;
				break;
			case 'football':
				$offset = 4;
				break;
			default:
				$offset = 4;
		}
		if ($currmon < $offset) {
			return (string)(($curryear - 1).'-'.$curryear);
		} else {
			return (string)($curryear.'-'.($curryear + 1));
		}

	}
}
if (!function_exists('boxscore_url'))
{
	function boxscore_url($team_array)
	{
		return 'http://m.denverpost.sportsdirectinc.com/'.$team_array['sport'].'/'.strtolower($team_array['league']).'-boxscores.aspx?page=/data/'.$team_array['league'].'/results/'.$team_array['season'].'/boxscore'.$team_array['gameid'].'.html';
	}
}
if (!function_exists('display_photos'))
{
	function display_photos($photourl)
	{
		if ( strpos($photourl,'photos.denverpost.com') !== false) {
            return sprintf('<div class="gallerychunk"><div id="mc-embed-container"></div> <div class="clear" style="margin-bottom:10px;"></div> <script> $(document).ready(function(){ setTimeout(function(){ mc_embed_gallery = new MCGallery({ url : \'%1$s\',captionHeight : \'85px\', parentContainer: \'mc-embed-container\' }); }, 1000); }); </script> </div>',
                $photourl
            );
        }
	}
}
if (!function_exists('display_videos'))
{
	function display_videos($videos)
	{
		$output = '';
		$ndn = false;
        for($i=0;$i <= count($videos);$i++) {
        	$h = strlen(trim($videos[$i]));
        	switch ($h)
	    	{
	    		case 6: //Tout
	    			$output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="ooEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("ooEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><iframe width="100%%" height="100%%" frameborder="0" id="tout_embed" src="//www.tout.com/embed/touts/%1$s"></iframe></div><div class="clear"></div></div></div>',
	                    $videos[$i],
	                    $i
                    );
					break;
				case 8: //NDN
	    			$output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="ooEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("ooEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><div class="ndn_embed" data-config-widget-id="2" style="width:100%%;height:100%%" data-config-type="VideoPlayer/Single" data-config-tracking-group="90115" data-config-video-id="%1$s" data-config-site-section="denverpost2se"></div></div><div class="clear"></div></div></div>',
	                    $videos[$i],
	                    $i
                    );
                    $ndn = true;
					break;
				case 11: //YouTube
	    			$output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="ooEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("ooEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><iframe width="100%%" height="100%%" src="//www.youtube.com/embed/%1$s" frameborder="0" allowfullscreen></iframe></div><div class="clear"></div></div></div>',
	                    $videos[$i],
	                    $i
                    );
					break;
				case 13: //Brightcove
	    			$output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="videoEmbed%3$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("videoEmbed%3$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><div style="display:none"></div><script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script><object id="myExperience%1$s" class="BrightcoveExperience"><param name="bgcolor" value="#FFFFFF" /><param name="width" value="100%%" /><param name="height" value="100%%" /><param name="playerID" value="747347108001" /><param name="playerKey" value="AQ~~,AAAAADe65VU~,G496cZ36A_WJiqq5Paft4yTJ0a5PQX2r" /><param name="isVid" value="true" /><param name="isUI" value="true" /><param name="dynamicStreaming" value="true" /><param name="@videoPlayer" value="%2$s" /></object><script type="text/javascript">brightcove.createExperiences();</script></div><div class="clear"></div></div></div>',
	                    $videos[$i],
	                    $videos[$i],
	                    $i
                    );
					break;
				case 32: //Ooyala
	                $output .= sprintf('<div class="gallerychunk"><div class="vid-embed-wrap" id="ooEmbed%2$s"><script type="text/javascript"> if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) { var videoWidth = document.getElementById("ooEmbed%2$s").offsetWidth; var videoRatio = 56.3; var videoHeight = (videoRatio / 100) * videoWidth; document.write(\'<style type="text/css">div.vid-embed iframe { height:\' + videoHeight + \'px; }</style>\'); } </script><div class="vid-height-space"></div><div class="vid-embed"><script height="100%%" width="100%%" src="http://player.ooyala.com/iframe.js#pbid=fce2cf476df14253a15351f1727031b4&ec=%1$s"></script></div><div class="clear"></div></div></div>',
	                    $videos[$i],
	                    $i
	                );
	                break;
            }
        }
        if ($ndn) { $output = '<script type="text/javascript"async src="http://launch.newsinc.com/js/embed.js" id="_nw2e-js"></script>' . $output; }
        return $output;
	}
}
?>