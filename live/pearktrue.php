<?php
$context = ['ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
]];

$name = $argv[1] ?? $_GET['name'] ?? 'CCTV1';
if ($response = json_decode(@file_get_contents(sprintf('https://api.pearktrue.cn/api/tv/search.php?name=%s', $name), false, stream_context_create($context)))) {
    if ($response->code == 200) {
        foreach ($response->data as $item) {
            if (stripos('39.134.24.161', $item->link) === false) {
                header(sprintf('Location: %s', $item->link));
            }
        }
    }
}
