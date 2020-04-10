<?php
/**
 * 签名类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 15:56
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */
namespace Glo\Live\Auth;

final class Signature
{
    private $appKey;
    private $appSecret;
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
    private function getSign($params)
    {
        ksort($params);//将参数按key进行排序
        $str = '';
        foreach ($params as $k => $val) {
            $str .= "{$k}={$val}&"; //拼接成 key1=value1&key2=value2&...&keyN=valueN& 的形式
        }
        $str = sprintf('%s&app_secret=%s', $str, $this->appSecret);
        $sign = md5($str);
        return $sign;
    }
}