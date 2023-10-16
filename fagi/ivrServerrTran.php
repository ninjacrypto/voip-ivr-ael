<?php

$request = $fastagi->request;
$stateinfo = $request['agi_arg_1'];
$accountnumber = $request['agi_arg_2'];
$serverrcode = $request['agi_arg_3'];
$resolutioncode = $request['agi_arg_4'];
$incidentdate = $request['agi_arg_5'];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://csgtestiservices.newscyclecloud.com/cgi-bin/cmo_csg-c-cmdbtst-01.sh/custservice/IVR/serverrtran.html?
    StateInfo=${stateinfo}&ServiceErrorCode=${serverrcode}&IncidentDate=${incidentdate}&AccountNumber=${accountnumber}&ResolutionCode=${resolutioncode}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$status = explode("<ReturnStatus>", $result);
$status1 = explode("</ReturnStatus>", $status[1]);
$status = $status1[0];

$fastagi->set_variable("RETURN_STATUS", $status);

?>