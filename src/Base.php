<?php
/**
 * 抽象类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/17 09:54
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live;

use Glo\Live\Auth\Signature;

class Base
{
    public $url = 'https://api.yeeaoo.com';
    public $signAuth;

    public function __construct(Signature $signature)
    {
        $this->signAuth = $signature;
    }
}