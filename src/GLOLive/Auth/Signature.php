<?php
/**
 * 签名类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 15:56
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace GLOLive\Auth;

class Signature
{
    public $appKey;
    public $appSecret;
    public function __construct($appKey, $appSecret)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    /**
     * 添加公共参数
     * @param array $params
     * @return array
     */
    public function handel($params = [])
    {
        $params['app_key'] = $this->appKey;
        $params['timestamp'] = time();
        $params['sign'] = $this->getSign($params);

        return $params;
    }

    /**
     * 处理签名
     * @param $params
     * @return string
     */
    public function getSign($params)
    {
        ksort($params);//将参数按key进行排序
        $str = http_build_query($params);
        $str = sprintf('%s&tenant_key=%s', $str, $this->appSecret);
        $sign = md5($str);
        return $sign;
    }
}