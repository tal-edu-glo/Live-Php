<?php
/**
 * 直播唤起
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/17 16:56
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 * @license     http://www.kmf.com license
 */

namespace Glo\Live;
use Glo\Live\Utils\Request;

class PullAgreement extends Base
{
    const STUDENT_ROLE = 0;
    const TEACHER_ROLE = 1;

    /**
     * 老师端唤起
     * @param array $params
     * [
     *      class_id    int     北斗直播ID
     *      user_id     int     用户ID
     *      head_img    string  用户头像
     *      user_name   string  用户名
     * ]
     * @return bool|string
     */
    public function teacher($params = [])
    {
        if (!isset($params['class_id']) || !$params['class_id'] ||
            !isset($params['user_id']) || !$params['user_id'] ||
            !isset($params['head_img']) || !$params['head_img'] ||
            !isset($params['user_name']) || !$params['user_name']
        ){
            return false;
        }
        $params['user_role'] = self::TEACHER_ROLE;
        return $this->pull($params);
    }

    /**
     * 学生端唤起
     * @param $params
     * [
     *      class_id    int     北斗直播ID
     *      user_id     int     用户ID
     *      head_img    string  用户头像
     *      user_name   string  用户名
     *      teacher_name string 老师用户名
     * ]
     * @return bool|string
     */
    public function student($params)
    {
        if (!isset($params['class_id']) || !$params['class_id'] ||
            !isset($params['user_id']) || !$params['user_id'] ||
            !isset($params['head_img']) || !$params['head_img'] ||
            !isset($params['user_name']) || !$params['user_name'] ||
            !isset($params['teacher_name']) || !$params['teacher_name']
        ){
            return false;
        }
        $params['user_role'] = self::STUDENT_ROLE;
        return $this->pull($params);
    }

    /**
     * 获取推流地址
     * @param $params
     * @return string
     */
    public function pull($params)
    {
        $url = sprintf("%s/live/pull/agreement", $this->url);
        return Request::get($url, $this->signAuth->handel($params), [
            'K-Version' => 'v2'
        ]);

    }
}