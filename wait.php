<?php
class Sample{
    private $flag = false;

    private function hoge_handler(){
        $this->flag = true;
        echo "flagをtrueにしました\n";
    }

    public function main(){
        pcntl_async_signals(true);
        pcntl_signal(SIGINT, array($this, 'hoge_handler'));
        while(1){
            echo "1の処理実施\n";
            sleep(1);
            echo "2の処理実施\n";
            sleep(1);
            echo "3の処理実施\n";
            sleep(1);
            echo "4の処理実施\n";
            sleep(1);
            echo "5の処理実施\n";
            sleep(1);
            if($this->flag){
                echo "終了フラグ検知\n";
                break;
            }
        }
        echo "処理終了\n";
    }
}

$sample = new Sample();
$sample->main();


