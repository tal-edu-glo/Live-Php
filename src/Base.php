<?php
/**
 * 抽象类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/17 09:54
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

include_once "./src/auth/Signature.php";

class Base
{
    public $url = 'https://test-api.yeeaoo.com';
    public $signAuth;

    public function __construct($appKey, $appSecret)
    {
        $this->signAuth = new Signature($appKey, $appSecret);
    }
}