<?php

namespace Glo\Live;

use Glo\Live\Utils\Request;

class ChatMessage extends Base
{
    /**
     * 获取历史聊天记录
     * @param int $classId 直播ID
     * @param int $groupId 分组ID
     * @param int $page 分页码
     * @param int $pageSize 每页条数
     * @return bool|mixed
     */
    public function historyMessage($classId, $groupId = 0, $page = 1, $pageSize = 50)
    {
        $url = sprintf("%s/live/chat/message", $this->url);
        return Request::get($url, $this->signAuth->handel([
            'class_id' => $classId,
            'group_id' => $groupId,
            'page' => $page,
            'page_size' => $pageSize,
        ]));
    }
}