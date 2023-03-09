## 概要

PHPerKaigi 2023  
「[安全にプロセスを停止するためにシグナル制御を学ぼう！](https://fortee.jp/phperkaigi-2023/proposal/b9414c59-cb8f-4654-84c7-ade44744295e)」  
にて使用したサンプルコードです。  

## 使い方

```bash
git clone https://github.com/yamamoto-hiroya/phperkaigi2023.git
cd phperkaigi2023/
docker pull php:8.2-fpm
docker-compose up -d
docker exec -it phperkaigi2023 bash

// 以下docker内
cd /var/www/html/
// 初回のみpcntlを有効にしてください
docker-php-ext-install pcntl
php wait.php
php notify.php

// 終わる時
exit
docker-compose stop
```
