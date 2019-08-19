<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/28
 * Time: 下午6:33
 */

namespace EasySwoole\EasySwoole;


use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use EasySwoole\EasySwoole\ServerManager;
use App\Lib\Process\ConsumerTest;
use App\Lib\Redis\Redis;
use EasySwoole\Component\Di;
use EasySwoole\Mysqli\Mysqli;
use EasySwoole\Mysqli\Config;



class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        // TODO: Implement initialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {

        Di::getInstance()->set('CONF',Config::class,Array (
            'host'=>'127.0.0.1',
            'user'=>'root',
            'password'=>'Xiaojie0707..',
            'database'=>'video',
            'port'=>'3306'));

        //注册mysql进入容器
        Di::getInstance()->set('MYSQL',Mysqli::class,Di::getInstance()->get('CONF'));

            //注册redis进容器
           // Di::getInstance()->set('REDIS',Redis::getInstance());

        //    $allNum = 3;
        //    for ($i = 0 ;$i < $allNum;$i++){
        //        //开启了是哪个子进程,自定义 进程名 , 去调用 ConsumerTest 里面的方法                 
        //        ServerManager::getInstance()->getSwooleServer()->addProcess((new ConsumerTest("my_dingyi_consumer_{$i}"))->getProcess());
        //    }
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        // TODO: Implement onRequest() method.
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}