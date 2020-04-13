<?php
/**
 * 唤起客户端链接测试类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/18 17:53
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live\Test;

use Glo\Live\PullAgreement;
use PHPUnit\Framework\TestCase;

class PullAgreementTest extends TestCase
{
    public $pullAgreementObj;

    public function setUp(): void
    {
        global $testAuth;
        $this->pullAgreementObj = new PullAgreement($testAuth);
    }

    public function testTeacher()
    {
        $result = $this->pullAgreementObj->teacher([
            'class_id' => 1,
            'user_id' => 1,
            'head_img' => 'http://www.test.com/test.jpg',
            'user_name' => 'test'
        ]);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']);

    }

    public function testStudent()
    {
        $result = $this->pullAgreementObj->student([
            'class_id' => 1,
            'user_id' => 1,
            'head_img' => 'http://www.test.com/test.jpg',
            'user_name' => 'test',
            'teacher_name' => 'teacher001'
        ]);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']);
    }
}