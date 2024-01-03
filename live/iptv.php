<?php
$context = ['ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
]];

$id = $_GET['id'];
header(sprintf('Location: https://tv.smart-chat.net/iptv.php?id=%s&num=1', $id));
