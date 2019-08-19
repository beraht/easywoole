<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/5/24
 * Time: 下午3:56
 */

namespace EasySwoole\Component;


trait Singleton
{
    private static $instance;

    static function getInstance(...$args)
    {
        if(!isset(self::$instance)){
             //通过static静态绑定来new绑定的对象
            self::$instance = new static(...$args);
        }
        return self::$instance;
    }
}