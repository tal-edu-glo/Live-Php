<?php
/**
 * 直播管理测试类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/18 09:37
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live\Test;

use Glo\Live\LiveClass;
use PHPUnit\Framework\TestCase;

class LiveTest extends TestCase
{
    public $liveObj;

    public function setUp()
    {
        global $testAuth;
        $this->liveObj = new LiveClass($testAuth);
    }

    public function testCreate()
    {
        $params = [
            'class_name' => 'paas直播测试001',
            'class_type' => 0,
            'start_time' => '2030-01-01 00:00:00',
            'end_time' => '2030-01-01 23:00:00',
            'class_number' => 50
        ];
        $result = $this->liveObj->create($params);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']['class_id']);

        $params['class_id']  = $result['result']['class_id'];
        $params['class_name'] = 'paas直播测试002';
        return $params;
    }

    /**
     * @depends testCreate
     * @param array $params
     * @return int
     */
    public function testEdit(array $params)
    {
        $result = $this->liveObj->edit($params);
        $this->assertEquals(200, $result['status']);
        return $params['class_id'];
    }

    /**
     * @depends testEdit
     * @param int $classId
     * @return int
     */
    public function testReplay(int $classId)
    {
        $result = $this->liveObj->replay($classId, 1);
        $this->assertEquals(200, $result['status']);
        return $classId;
    }

    /**
     * @depends testReplay
     * @param int $classId
     */
    public function testDelete(int $classId)
    {
        $result = $this->liveObj->delete($classId);
        $this->assertEquals(200, $result['status']);
    }


}