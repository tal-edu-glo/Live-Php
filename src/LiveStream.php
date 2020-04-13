<?php

namespace Glo\Live;

use Glo\Live\Utils\Request;

class LiveStream extends Base
{
    /**
     * 获取直播拉流地址
     * @param $classId 直播ID
     * @param $userId 老师ID,老师端进入直播间传入的用户ID
     * @param int $protocol 获取协议 1 rtmp 2 flv 3 HLS(m3u8)
     * @return bool|mixed
     */
    public function pullStreamAddress($classId, $userId, $protocol = 1)
    {
        $url = sprintf("%s/live/stream/address", $this->url);
        return Request::get($url, $this->signAuth->handel([
            'class_id' => $classId,
            'user_id' => $userId,
            'protocol' => $protocol,
        ]));
    }
}