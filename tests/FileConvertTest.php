<?php
/**
 * 直播课件转播类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/18 17:53
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live\Test;

use Glo\Live\FileConvert;
use PHPUnit\Framework\TestCase;

class FileConvertTest extends TestCase
{
    public $fileConvertObj;

    public function setUp()
    {
        global $testAuth;
        $this->fileConvertObj = new FileConvert($testAuth);
    }

    public function testUpload()
    {
        $result = $this->fileConvertObj->upload(
            '1111.pdf',
            'http://doc.kmf.com/yunying-material/1e/9b/1e9b908aa6ae14bb343f8b93ff39d672.pdf'
        );
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']['id']);

        return $result['result']['id'];
    }

    /**
     * @depends testUpload
     * @param int $fileId
     */
    public function testGetFileInfo(int $fileId)
    {
        $result = $this->fileConvertObj->get($fileId);
        $this->assertEquals(200, $result['status']);
        $this->assertNotNull($result['result']);
    }
}