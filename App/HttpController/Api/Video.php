<?php

namespace App\HttpController\Api;
use App\Model\Video as VideoModel;
use EasySwoole\Http\Message\Status;

//use EasySwoole\Utility\Validate\Rules;
//use EasySwoole\Utility\Validate\Rule;

use EasySwoole\Validate\Validate;
//use EasySwoole\Component\Logger;
use EasySwoole\EasySwoole\Logger;
//use EasySwoole\Swoole\Task\TaskManager;
use EasySwoole\EasySwoole\Swoole\Task\TaskManager;
use EasySwoole\Component\Di;
/**
 * Class Index. 
 * @package App\HttpController
 */
class Video extends Base
{
    public function add() {
        $params = $this->request()->getRequestParam();

        $data = [
            'name' => $params['name'],
            'url' => $params['url'],
            'image' => $params['image'],
            'content' => $params['image'],
            'cat_id' => intval($params['cat_id']),
            'create_time' => time(),
            'uploader' => 'singwa',
            'status' => 1, // 0  1 2
        ];

        // 插入
        try {
            $modelObj = new VideoModel();
            $videoId = $modelObj->add($data);
        }catch(\Exception $e) {
            return $this->writeJson(Status::CODE_BAD_REQUEST, $e->getMessage());
        }

        if(!empty($videoId)) {
                return $this->writeJson(Status::CODE_OK, 'OK', ['id' => $videoId ]);
        } else {
            return $this->writeJson(Status::CODE_BAD_REQUEST, '提交视频有误', ['id' => 0 ]);
        }

    }
}
