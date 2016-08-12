<?php

//convert the saved xml to JSON when requested by the page
class XmlToJson {
	public function Parse ($url) {
		$fileContents= file_get_contents($url);
		$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
		$fileContents = trim(str_replace('"', "'", $fileContents));
		$simpleXml = simplexml_load_string($fileContents);
		$json = json_encode($simpleXml);
		return $json;
	}
}

//set up headers for JSONP for cross-server compatibility if a callback request exists; otherwise just dump straight JSON
if ( array_key_exists('callback', $_GET) ) {

    header('Content-Type: text/javascript; charset=utf8');
    header('Access-Control-Allow-Origin: http://www.example.com/');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $callback = $_GET['callback'];
    //echo $callback.'('.XmlToJson::Parse("nfl_1st_quarter_sample.xml").');';
    echo $callback.'('.XmlToJson::Parse("updates.xml").');';

} else {
    // normal JSON string
    header('Content-Type: application/json; charset=utf8');

    echo XmlToJson::Parse("updates.xml");
    //echo XmlToJson::Parse("nfl_1st_quarter_sample.xml");
}

?>