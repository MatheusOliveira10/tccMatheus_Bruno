<?php
require __DIR__ . '/vendor/autoload.php';
include 'web/model/query.php';

use Workerman\Worker;

$worker = new Worker();

$worker->onWorkerStart = function(){
    $mqtt = new Workerman\Mqtt\Client('mqtt://test.mosquitto.org:1883');
    $mqtt->onConnect = function($mqtt) {
        $mqtt->subscribe('mobg/teste');
    };
    $mqtt->onMessage = function($topic, $content){
        $qry = "INSERT INTO teste(teste) VALUES (";
        $qry .= "'" . $content . "'";
        $qry .= ")";

        insert($qry);
    };
    $mqtt->connect();
};

Worker::runAll();