<?php
$raw = file_get_contents('https://fanmingming.com/txt?url=https://live.fanmingming.com/tv/m3u/global.m3u', false, stream_context_create([
    'http' => [
        'timeout' => 30,
        'method' => 'GET',
        'header' => 'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ]
]));

$today = substr($raw, stripos($raw, 'auth=') + 5, stripos($raw, '&id=') - stripos($raw, 'auth=') - 5);
if (strlen($today) > 0) {
    $iptv = file_get_contents('iptv.txt');
    $past = substr($iptv, stripos($iptv, 'auth=') + 5, stripos($iptv, '&id=') - stripos($iptv, 'auth=') - 5);

    file_put_contents('iptv.txt', str_ireplace($past, $today, $iptv));
    printf("auth: %s->%s\n", $past, $today);
}
