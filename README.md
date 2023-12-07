#!/bin/bash

<< EOF
https://github.com/hjdhnx/dr_py.git

https://github.com/gaotianliuyun/gao
https://github.com/mcp2016/TVBox

https://www.similarweb.com/top-websites/category/adult/
https://qiqi2020.lanzoub.com/b09svqv1c

https://bing.img.run/rand.php
https://api.lyiqk.cn/scenery
https://picsum.photos/1920/1080
https://source.unsplash.com/user/erondu/1920x1080
https://api.biuioi.com/random-picture/index.php
https://tuapi.eees.cc/api.php?category=fengjing&type=302
EOF

# 从 github 拉取新代码

cd `dirname $0`
echo $tv
git pull -f
