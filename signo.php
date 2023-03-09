<?php
pcntl_async_signals(true);
function hoge_handler($signo){
    echo "シグナル{$signo}を検知しました\n";
    if($signo === SIGINT){
        echo "SIGINTなので停止します\n";
        exit;
    } elseif($signo === SIGTERM){
        echo "SIGTERMなので継続します\n";
        return;
    } else {
        echo "意図していないシグナルなので例外を投げます\n";
        throw new Exception('予期しないシグナル');
    }
}
pcntl_signal(SIGINT, "hoge_handler");
pcntl_signal(SIGTERM, "hoge_handler");
pcntl_signal(SIGQUIT, "hoge_handler");

while(1){
    echo "wait...\n";
    sleep(1);
}


