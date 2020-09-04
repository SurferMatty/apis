<?php

    $url="api.openweathermap.org/data/2.5/weather?q=". $_REQUEST['city'].'&appid=738bc0906f1d9a7ad45eed9fccf0fc91';

    $ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$res=curl_exec($ch);

   curl_close($ch);
   
   $decode = json_decode($res, true);

   
   $retArr['status']['code'] = "200";
   $retArr['data'] = $decode['weather'];

   echo json_encode($retArr);

?>