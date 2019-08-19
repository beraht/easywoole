<?php
namespace App\HttpController\Api;

use App\HttpController\Api\Base;
use App\Lib\Redis\Redis;
use EasySwoole\Component\Di;

class Index extends Base
{

    function video()
    {

        $data = [
            "id"=>1,
            "name"=>"video",
            "age"=>18,
        ];
        return $this->writeJson(200,$data,'成功');

        
    }

    // public function redis(){
    //     $redis = new \Redis();
    //     $redis->connect("127.0.0.1",6379,5);
    //     $redis->set('age',18);
    //     return $this->writeJson(200,'ok',$redis->get("age"));
    // }

    public function get_redis(){
        //连接redis , 单例模式
        $age = Redis::getInstance()->get('age');
        return $this->writeJson(200,'ok',$age);
    }

    public function yaconf(){
        //redis是 redis.ini 的前缀
       $result =  \Yaconf::get('redis');
       return $this->writeJson(200,'ok',$result);
    }

    /**
     * 生成者
     *
     * @return void
     */
    public function pub(){
        $param = $this->request()->getRequestParam();
        //抛入数据
        Di::getInstance()->get('REDIS')->rPush('name_list',$param['name']);

    }
}
