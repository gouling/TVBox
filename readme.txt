#!/bin/bash

<< EOF
https://github.com/hjdhnx/dr_py.git
https://download.kstore.space/download/2863/01.txt

https://github.com/youshandefeiyang/LiveRedirect
https://github.com/youshandefeiyang/live-Url
https://github.com/fanmingming/live
https://github.com/dlgt7/TVbox-interface/
https://github.com/gaotianliuyun/gao
https://github.com/2hacc/TVBox
https://agit.ai/fenwe/TVBox
https://agit.ai/138001380000/MHQTV

https://www.similarweb.com/top-websites/category/adult/
https://qiqi2020.lanzoub.com/b09svqv1c

https://bing.img.run/rand.php
https://api.lyiqk.cn/scenery
https://picsum.photos/1920/1080
https://source.unsplash.com/user/erondu/1920x1080
https://api.biuioi.com/random-picture/index.php
https://tuapi.eees.cc/api.php?category=fengjing&type=302
EOF

# 获取直播源
tv=`curl http://tvbox.cdtyk.com/live/iptv.php`

# 更新直播源 gouling.eu.org
cd `dirname $0`
echo "iptv: {$tv}"
git pull -f
git commit -a -m "iptv ${tv}"
git push origin master