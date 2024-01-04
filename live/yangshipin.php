<?php
class TV
{
    const YSP_API = 'https://player-api.yangshipin.cn/v1/player/get_live_info';
    const YSP_CHANNEL = [
        'cctv-4k' => 2000266303,
        'cctv-8k' => 2020603401,
        'cctv-1' => 2000210103,
        'cctv-2' => 2000203603,
        'cctv-3' => 2000203803,
        'cctv-4' => 2000204803,
        'cctv-5' => 2000205103,
        'cctv-5p' => 2000204503,
        'cctv-6' => 2000203303,
        'cctv-7' => 2000510003,
        'cctv-8' => 2000203903,
        'cctv-9' => 2000499403,
        'cctv-10' => 2000203503,
        'cctv-11' => 2000204103,
        'cctv-12' => 2000202603,
        'cctv-13' => 2000204603,
        'cctv-14' => 2000204403,
        'cctv-15' => 2000205003,
        'cctv-16' => 2012375003,
        'cctv-16-4k' => 2012492303,
        'cctv-17' => 2000204203,

        'CCTV兵器科技' => 2012513403,
        'CCTV第一剧场' => 2012514403,
        'CCTV怀旧剧场' => 2012511203,
        'CCTV风云剧场' => 2012513603,
        'CCTV风云音乐' => 2012514103,
        'CCTV风云足球' => 2012514203,
        'CCTV电视指南' => 2012514003,
        'CCTV女性时尚' => 2012513903,
        'CCTV央视文化精品' => 2012513803,
        'CCTV世界地理' => 2012513303,
        'CCTV高尔夫网球' => 2012512503,
        'CCTV央视台球' => 2012513703,
        'CCTV卫生健康' => 2012513503,

        'cgtn' => 2001656803, //CGTN
        'cgtnjl' => 2010155403, //CGTN纪录
        'cgtne' => 2010152503, //CGTN西语
        'cgtnf' => 2010153503, //CGTN法语
        'cgtna' => 2010155203, //CGTN阿语
        'cgtnr' => 2010152603, //CGTN俄语

        'bjws' => 2000272103, //北京卫视
        'dfws' => 2000292403, //东方卫视
        'tjws' => 2019927003, //天津卫视
        'cqws' => 2000297803, //重庆卫视
        'hljws' => 2000293903, //黑龙江卫视
        'lnws' => 2000281303, //辽宁卫视
        'hbws' => 2000293403, //河北卫视
        'sdws' => 2000294803, //山东卫视
        'ahws' => 2000298003, //安徽卫视
        'hnws' => 2000296103, //河南卫视
        'hubws' => 2000294503, //湖北卫视
        'hunws' => 2000296203, //湖南卫视
        'jxws' => 2000294103, //江西卫视
        'jsws' => 2000295603, //江苏卫视
        'zjws' => 2000295503, //浙江卫视
        'dnws' => 2000292503, //东南卫视
        'gdws' => 2000292703, //广东卫视
        'szws' => 2000292203, //深圳卫视
        'gxws' => 2000294203, //广西卫视
        'gzws' => 2000293303, //贵州卫视
        'scws' => 2000295003, //四川卫视
        'xjws' => 2019927403, //新疆卫视
        'hinws' => 2000291503, //海南卫视
    ];
    const YSP_RETRY = 10;

    private $__id, $__arg;
    private $__request;

    public function __construct($id)
    {
        $this->__id = $id;
        $this->__arg = (object) [
            'salt' => '0f$IVHi9Qno?G',
            'platform' => '5910204',
            'key' => hex2bin('48e5918a74ae21c972b90cce8af6c8be'),
            'iv' => hex2bin('9a7e7d23610266b1d9fbf98581384d92'),
            'time' => time(),
            'guid' => '0',
            'retry' => 0,
        ];

        if (!isset(self::YSP_CHANNEL[$this->__id])) {
            throw new \Exception('渠道信息错误。', 412);
        }
    }

    public function getUri()
    {
        $this->__arg->time = time();
        $this->__request = curl_init(self::YSP_API);

        curl_setopt_array($this->__request, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Referer: https://www.yangshipin.cn/',
                'Cookie: guid=0;vplatform=109',
                'Yspappid: 519748109',
            ],
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($this->__getPostData())
        ]);

        try {
            if ($response = json_decode(curl_exec($this->__request))) {
                if ($response->code == 0) {
                    return sprintf('%s', $response->data->playurl);
                } else if ($this->__arg->retry++ < self::YSP_RETRY) {
                    return $this->getUri();
                }
            }
        } finally {
            curl_reset($this->__request);
        }
    }

    private function __getPostData()
    {
        $val = [
            'adjust' => 1,
            'appVer' => 'V1.0.0',
            'app_version' => 'V1.0.0',
            'cKey' => $this->__getKey(),
            'channel' => 'ysp_tx',
            'cmd' => '2',
            'cnlid' => (string) self::YSP_CHANNEL[$this->__id],
            'defn' => 'fhd',
            'devid' => 'devid',
            'dtype' => 1,
            'encryptVer' => '8.1',
            'guid' => $this->__arg->guid,
            'otype' => 'ojson',
            'platform' => $this->__arg->platform,
            'rand_str' => (string) $this->__arg->time,
            "sphttps" => '1',
            "stream" => '2'
        ];
        $val['signature'] = md5(http_build_query($val) . $this->__arg->salt);

        return $val;
    }

    private function __getKey()
    {
        $val = sprintf(
            '|%s|%s|mg3c3b04ba|V1.0.0|%s|%s|https://www.yangshipin.c|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|',
            self::YSP_CHANNEL[$this->__id],
            $this->__arg->time,
            $this->__arg->guid,
            $this->__arg->platform
        );

        $len = strlen($val);
        $key = 0;
        for ($i = 0; $i < $len; $i++) {
            $key = ($key << 5) - $key + ord($val[$i]);
            $key &= $key & 0xFFFFFFFF;
        }

        $key = ($key > 2147483648) ? $key - 4294967296 : $key;
        $val = '|' . $key . $val;

        return '--01' . strtoupper(bin2hex(openssl_encrypt($val, 'AES-128-CBC', $this->__arg->key, 1, $this->__arg->iv)));
    }
}

$id = $argv[1] ?? $_GET['id'] ?? 'cctv-1';
$tv = new TV($id);
header(sprintf('Location: %s', $tv->getUri()));
