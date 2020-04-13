<?php
/**
 * 获取拉流信息单元测试
 */

namespace Glo\Live\Test;

use Glo\Live\LiveStream;
use PHPUnit\Framework\TestCase;

class LiveStreamTest extends TestCase
{
    public $liveStreamObj;

    public function setUp(): void
    {
        global $testAuth;
        $this->liveStreamObj = new LiveStream($testAuth);
    }

    public function testPullStreamAddress()
    {
        $result = $this->liveStreamObj->pullStreamAddress(2213, 398, $protocol = 1);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']);

        return $result['result'] ?? [];
    }

}