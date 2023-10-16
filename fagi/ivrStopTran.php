<?php

$request = $fastagi->request;
$stateinfo = $request['agi_arg_1'];
$accountnumber = $request['agi_arg_2'];
$transactiontype = $request['agi_arg_3'];
$stoptype = $request['agi_arg_4'];
$stopdate = $request['agi_arg_5'];
$restartdate = $request['agi_arg_6'];

print("https://csgtestiservices.newscyclecloud.com/cgi-bin/cmo_csg-c-cmdbtst-01.sh/custservice/IVR/stoptran.html?StateInfo=${stateinfo}&AccountNumber=${accountnumber}&StopType=${stoptype}&StopDate=${stopdate}&RestartDate=${restartdate}&TransactionType=${transactiontype}");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://csgtestiservices.newscyclecloud.com/cgi-bin/cmo_csg-c-cmdbtst-01.sh/custservice/IVR/stoptran.html?StateInfo=${stateinfo}&AccountNumber=${accountnumber}&StopType=${stoptype}&StopDate=${stopdate}&RestartDate=${restartdate}&TransactionType=${transactiontype}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$status = explode("<ReturnStatus>", $result);
$status1 = explode("</ReturnStatus>", $status[1]);
$status = $status1[0];

$fastagi->set_variable("RETURN_STATUS", $status);

?>