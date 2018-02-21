<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/21
 * Time: 16:43
 */
use Workerman\Worker;
use PHPSocketIO\SocketIO;
require_once '../vendor/autoload.php';
$io = new SocketIO(3120);
// 监听一个http端口，通过http协议访问这个端口可以向所有客户端推送数据(url类似http://ip:9191?msg=xxxx)
$io->on('workerStart', function()use($io) {
    $inner_http_worker = new Worker('http://0.0.0.0:99');
    $inner_http_worker->onMessage = function($http_connection, $data)use($io){
        if(!isset($_GET['msg'])) {
            return $http_connection->send('fail, $_GET["msg"] not found');
        }
//        $io->emit('chat message', $_GET['msg']);
//        $http_connection->broadcast->emit('event name', $data);
//        $http_connection->send('ok');
    };
    $inner_http_worker->listen();
});

// 当有客户端连接时
$io->on('connection', function($socket)use($io){
//    $socket->on('chat message', function($msg)use($io){
//        $io->emit('chat message from server', $msg);
////        $socket->broadcast->emit('event name', $msg);
//    });
    $socket->on('event name', function($msg)use($socket){
//        $io->emit('chat message from server', $msg);
        $socket->broadcast->emit('event name', $msg);
    });
//            $socket->broadcast->emit('event name', '111');

});
Worker::runAll();