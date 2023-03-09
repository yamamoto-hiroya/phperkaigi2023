<?php
class Sample{
    private $progress_status = 0;

    private function hoge_handler(){
        echo "停止命令を検知しました\n";
        echo "{$this->progress_status}まで処理が進みました\n";
        exit;
    }

    public function main(){
        pcntl_async_signals(true);
        pcntl_signal(SIGINT, array($this, 'hoge_handler'));

        echo "1の処理実施\n";
        $this->progress_status = 1;
        sleep(1);
        echo "2の処理実施\n";
        $this->progress_status = 2;
        sleep(1);
        echo "3の処理実施\n";
        $this->progress_status = 3;
        sleep(1);
        echo "4の処理実施\n";
        $this->progress_status = 4;
        sleep(1);
        echo "5の処理実施\n";
        $this->progress_status = 5;
        sleep(1);

        echo "処理終了\n";
    }
}

$sample = new Sample();
$sample->main();


