<?php
$context = ['ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
]];

$id = $_GET['id'];
$tv = [
    '默认' => 'http://httplive.slave.bfgd.com.cn:14311/playurl?playtype=live&protocol=http&accesstoken=R5F2408FEU3198804BK78052214IE73560DFP2BF4M340CE68V0Z339CBW1626D4D261E46FEA&playtoken=ABCDEFGH&programid=',

    '浙江卫视' => 'http://hw-m-l.cztv.com/channels/lantian/channel001/1080p.m3u8',
    '浙江国际' => 'http://hw-m-l.cztv.com/channels/lantian/channel010/1080p.m3u8'
];
if (isset($tv[$id])) {
    header(sprintf('Location: %s', $tv[$id]));
} else {
    header(sprintf('Location: %s%s', $tv['默认'], $id));
}
