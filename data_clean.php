<?php
class Sample{
    /**
     * 10: 未着手
     * 20: 着手中
     * 30: 終了
     * DBのレコードか何かだと思ってください
     */
    public $progress_status = 10;

    private static function hoge_handler(){
        throw new Exception('停止命令検知');
    }

    public function main(){
        pcntl_async_signals(true);
        pcntl_signal(SIGINT, array('Sample', 'hoge_handler'));

        try{
            echo "処理開始\n";
            $this->progress_status = 20;

            echo "なんらかの処理\n";
            sleep(5);

            $this->progress_status = 30;
            echo "処理終了\n";
        }catch(Exception $e){
            echo "例外発生\n";
            echo "{$e->getMessage()}\n";
            $this->progress_status = 10;
            echo "ステータスを10に戻しました\n";
        }
    }
}

$sample = new Sample();
var_dump($sample->progress_status);
$sample->main();
var_dump($sample->progress_status);


