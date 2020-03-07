<?php

interface iDriver
{
    public function drive();
    public function repair();
}

class Driver implements iDriver {

    public function drive() {
        echo 'Я еду' . '<br>';
    }

    public function repair() {
        echo 'Я чиню' . '<br>';
    }
}

class BusDriver extends Driver {
    public function stop() {
        echo 'Я заехал на остановку' . '<br>';
    }
}

class AutoDriver extends Driver {

}

$driver1= new AutoDriver();
$driver1->drive();

$driver2= new BusDriver();
$driver2->repair();
$driver2->stop();


//
//
//class Logger {
//
//    private $count = 0;
//    public $fh;
//    /**
//     * @return int
//     */
//    public function getCount()
//    {
//        return $this->count;
//    }
//
//    public function logger(){
//       $this->count++;
//       $str = $this->prepareParamString(func_get_arg());
//       echo $str;
//       fwrite();
//    }
//
//    public function prepareParamString($filename) {
//        return $this->count;
//    }
//
//    public function __construct($filename) {
//        $this->fh = fopen ('test.log', 'w');
//    }
//
//    function __destruct(){
//        fclose($this->fh);
//    }
//}