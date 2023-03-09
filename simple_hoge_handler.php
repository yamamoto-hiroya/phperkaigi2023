<?php
pcntl_async_signals(true);
function hoge_handler($sig){
    echo "hoge\n";
    exit;
}
pcntl_signal(SIGINT, "hoge_handler");

while(1){
    echo "wait...\n";
    sleep(1);
}

