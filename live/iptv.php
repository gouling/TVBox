<?php
$id = $argv[1] ?? $_GET['id'] ?? '100100';
header(sprintf('Location: https://tv.smart-chat.net/iptv.php?id=%s&num=1', $id));
