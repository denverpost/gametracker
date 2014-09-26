<?php
date_default_timezone_set('America/Denver');
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
?>