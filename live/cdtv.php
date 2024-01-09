<?php
$context = ['ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
]];
$live = [
    '新闻综合频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv1high/CDTV1High.flv/playlist.m3u8',
    '经济资讯频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv2high/CDTV2High.flv/playlist.m3u8',
    '都市生活频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv3high/CDTV3High.flv/playlist.m3u8',
    '影视文艺频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv4high/CDTV4High.flv/playlist.m3u8',
    '公共频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv5high/CDTV5High.flv/playlist.m3u8',
    '少儿频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://cdn1.cditv.cn/cdtv6high/CDTV6High.flv/playlist.m3u8',
    '彭州市广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/pengzhou.flv/playlist.m3u8',
    '新津电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/xinjin.flv/playlist.m3u8',
    '青白江融媒体中心' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/qingbaijiang.flv/playlist.m3u8',
    '蒲江电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/pujiang.flv/playlist.m3u8',
    '大邑广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/dayi.flv/playlist.m3u8',
    '金堂电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/jintang.flv/playlist.m3u8',
    '邛崃电视台综合频道' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/qionglai.flv/playlist.m3u8',
    '都江堰电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/dujiangyan.flv/playlist.m3u8',
    '简阳市广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/jianyang.flv/playlist.m3u8',
    '郫都区广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/pidu.flv/playlist.m3u8',
    '双流区广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/shuangliu.flv/playlist.m3u8',
    '温江电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/wenjiang.flv/playlist.m3u8',
    '新都区广播电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/xindu.flv/playlist.m3u8',
    '龙泉驿区新闻中心' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/longquanyi.flv/playlist.m3u8',
    '成华有线电视' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/chenghua.flv/playlist.m3u8',
    '武侯电视' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/wuhou.flv/playlist.m3u8',
    '金牛区有线电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://jntv.pull.cditv.cn/live/jntv.flv/playlist.m3u8',
    '青羊区融媒体中心' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/qingyang.flv/playlist.m3u8',
    '锦江电视' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/jinjiang.flv/playlist.m3u8',
    '高新电视台' => 'https://cstvweb.cdmp.candocloud.cn/live/getLiveUrl?url=https://quxian.pull.cditv.cn/live/gaoxin.flv/playlist.m3u8'
];

$name = $argv[1] ?? $_GET['name'] ?? '新闻综合频道';
if (isset($live[$name])) {
    if ($info = json_decode(@file_get_contents($live[$name], false, stream_context_create($context)))) {
        if ($info->code == 0) {
            header(sprintf('Location: %s', $info->data->url));
        }
    }
}
