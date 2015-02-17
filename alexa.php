<?php

$incoming_webhook_url = "INCOMING_WEBHOOK_URL";

$username = "Javis";
$icon = ":speech_balloon:";

$text = trim($_POST['text']);
$channel_name = trim($_POST['channel_name']);

$url = "http://www.alexa.com/siteinfo/".$text;

$response = file_get_contents($url);

$global_pattern = '/<img class=\'img-inline \' src=\'\/images\/icons\/globe-sm.jpg\' title=\'Global rank icon\' alt=\'Global rank icon\'><strong class="metrics-data align-vmiddle">(.*)<\/strong>/';
$local_pattern = '/ Flag\'><strong class="metrics-data align-vmiddle">(.*)<\/strong>/';

preg_match($global_pattern, $response, $global_matches);
preg_match($local_pattern, $response, $local_matches);

$global_rank = trim($global_matches[1]);
$local_rank = trim($local_matches[1]);
$local_rank = empty($local_rank) ? " ~ " : $local_rank;

$content  = "Site Domain: ".$text."\\n";
$content .= "Global Rank: ".$global_rank."\\n";
$content .= "Local Rank: ".$local_rank."\\n";

$payload = array(
    'text'            => rawurlencode($content),
    'username'        => $username,
    'icon_emoji'    => $icon,
    'channel'        => "#".$channel_name
);

$jsonPayload = "payload=".json_encode($payload);


$curl = curl_init($incoming_webhook_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);

$return = curl_exec($curl);

curl_close($curl);
