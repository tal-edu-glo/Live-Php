<?php
/**
 * 聊天记录相关
 */

namespace Glo\Live\Test;

use Glo\Live\ChatMessage;
use PHPUnit\Framework\TestCase;

class ChatMessageTest extends TestCase
{
    public $obj;

    public function setUp(): void
    {
        global $testAuth;
        $this->obj = new ChatMessage($testAuth);
    }

    public function testHistoryMessage()
    {
        $result = $this->obj->historyMessage(2345);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']);

        return $result['result'] ?? [];
    }

}