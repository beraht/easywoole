<?php
namespace App\HttpController\Api;

use EasySwoole\Http\AbstractInterface\Controller;

class Base extends Controller
{

    public function index()
    {

        $data = [
            "id"=>1,
            "name"=>"dell",
            "age"=>18,
        ];
        return $this->writeJson(200,$data,'成功');

        
    }
    /**
     * 相当于拦截器(重写)
     *
     * @param string|null $action
     * @return boolean|null
     */
    public function onRequest(?string $action): ?bool
    {
        //$this->writeJson(200,["无权限访问"],'成功');
        return true;
    }

    /**
     * 异常重写
     */
    // public function onException(\Throwable $throwable): void
    // {
    //     $this->writeJson(400,'',"请求不合法"); 
    // }

}
