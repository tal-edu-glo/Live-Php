<?php
/**
 * 课程类方法
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 15:56
 *
 * @copyright   2018 好未来教育科技集团-考满分事业部
 */

namespace Glo\Live;
use Glo\Live\Utils\Request;

class LiveClass extends Base
{
    /**
     * 添加直播
     * @param array $params
     * [
     *      'class_name'    string  直播课程名称
     *      'class_type'    int     直播类型 0大班,1小班,21v1,3公开课
     *      'start_time'    string  直播开始时间 1970-01-01 00:00:00
     *      'end_time'      string  直播结束时间 1970-01-01 00:02:00
     *      'class_number'  string  参与直播人数 活动/公开课建议填写 默认大班50
     *      'live_id'  int  业务传入的直播ID,相同class_type类型下live_id保证其唯一性
     * ]
     * @return bool|mixed
     */
    public function create($params = [])
    {
        $url = sprintf("%s/class/pass/live/create", $this->url);
        return Request::post($url, $this->signAuth->handel($params));
    }

    /**
     * 编辑直播
     * @param array $params
     * [
     *      'class_id'      int     北斗直播课节id
     *      'class_name'    string  直播课程名称
     *      'class_type'    int     直播类型 0大班,1小班,21v1,3公开课
     *      'start_time'    string  直播开始时间 1970-01-01 00:00:00
     *      'end_time'      string  直播结束时间 1970-01-01 00:02:00
     *      'class_number'  string  参与直播人数 活动/公开课建议填写 默认大班50
     * ]
     * @return bool|mixed
     */
    public function edit($params = [])
    {
        $url = sprintf("%s/class/pass/live/edit", $this->url);
        return Request::post($url, $this->signAuth->handel($params));
    }

    /**
     * 删除直播
     * @param int $classId
     * @return bool|mixed
     */
    public function delete($classId = 0)
    {
        $url = sprintf("%s/class/pass/live/delete", $this->url);
        return Request::post($url, $this->signAuth->handel([
            'class_id' => $classId
        ]));
    }

    /**
     * 获取回放地址
     * @param int $classId
     * @param int $userId
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