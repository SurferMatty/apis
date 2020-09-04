<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include('openCage/AbstractGeocoder.php');
	include('openCage/Geocoder.php');

	$geocoder = new \OpenCage\Geocoder\Geocoder('f532b5192a67483c872696510fb40170');

	$result = $geocoder->geocode('51.952659, 7.632473', ['language' => 'fr']);

	if (in_array($result['status']['code'], [401,402,403,429])) {

		$handle = curl_init('https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext=' . urlencode($_REQUEST['q']) . '&gen=9&language=' . $_REQUEST['lang'] . '&locationattributes=tz&locationattributes=tz&apiKey=3a-30Zv1XS6W1oOiLxhsIfSudk2mDak6bfVQmOrPvjA');

        curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: text/plain; charset=UTF-8'));
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $json_result = curl_exec($handle);

		$r = json_decode($json_result, true);
	};


	header('Content-Type: application/json; charset=UTF-8');
	
	echo json_encode($result['results'], JSON_UNESCAPED_UNICODE);

?>
