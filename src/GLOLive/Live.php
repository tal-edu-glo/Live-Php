<?php
/**
 * 课程类方法
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 15:56
 *
 * @copyright   2018 好未来教育科技集团-考满分事业部
 */

namespace GLOLive;
use GLOLive\Utils\Request;

class Live extends Base
{
    /**
     * 获取回放地址
     * @param int $classId //1798
     * @param int $userId  //3000056
     * @return bool|mixed
     */
    public function replay($classId = 0, $userId = 0)
    {
        if (!$classId || !$userId) {
            return false;
        }
        $url = sprintf("%s/live/get/replay", $this->url);
        return Request::get($url, $this->signAuth->handel([
            'class_id' => $classId,
            'user_id' => $userId,
        ]), [
            'K-Version' => 'v2'
        ]);
    }
}