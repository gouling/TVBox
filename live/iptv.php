<?php
$context = ['ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
]];

$id = $_GET['id'];
$tv = [
    '默认' => 'http://live.aishang.ctlcdn.com/:id/playlist.m3u8?CONTENTID=:id&AUTHINFO=FABqh274XDn8fkurD5614t%2B1RvYajgx%2Ba3PxUJe1SMO4OjrtFitM6ZQbSJEFffaD35hOAhZdTXOrK0W8QvBRom%2BXaXZYzB%2FQfYjeYzGgKhP%2Fdo%2BXpr4quVxlkA%2BubKvbU1XwJFRgrbX%2BnTs60JauQUrav8kLj%2FPH8LxkDFpzvkq75UfeY%2FVNDZygRZLw4j%2BXtwhj%2FIuXf1hJAU0X%2BheT7g%3D%3D&USERTOKEN=eHKuwve%2F35NVIR5qsO5XsuB0O2BhR0KR',

    '浙江卫视' => 'http://hw-m-l.cztv.com/channels/lantian/channel001/1080p.m3u8',
    '浙江国际' => 'http://hw-m-l.cztv.com/channels/lantian/channel010/1080p.m3u8'
];
if (isset($tv[$id])) {
    header(sprintf('Location: %s', $tv[$id]));
} else {
    header(sprintf('Location: %s', str_ireplace(':id', $id, $tv['默认'])));
}
