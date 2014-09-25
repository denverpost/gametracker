<?php
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
if (!function_exists('test_img_url'))
{
	//tests a URL to make sure it gets a 200 status; returns the URL if true
	function test_img_url($image_url)
	{
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
if (!function_exists('get_http_response_code'))
{
	//just gets HTTP response code
	function get_http_response_code($url)
	{
	    $headers = get_headers($url);
	    return substr($headers[0], 9, 3);
	}
}
?>