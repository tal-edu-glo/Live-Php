<?php
/**
 * 文件转码类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/17 16:34
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live;
use Glo\Live\Utils\Request;

class FileConvert extends Base
{
    /**
     * 课件上传
     * @param $fileName string 文件名称
     * @param $filePath string 需要转码的文件地址
     * @return string
     */
    public function upload($fileName, $filePath)
    {
        if (!$fileName || !$filePath) {
            return false;
        }
        $url = sprintf("%s/pan/convert/upload", $this->url);
        return Request::post($url, $this->signAuth->handel([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]));
    }

    /**
     * 课件获取接口
     * @param $fileId
     * @return bool|string
     */
    public function get($fileId)
    {
        if (!$fileId) {
            return false;
        }
        $url = sprintf("%s/pan/convert/get", $this->url);
        return Request::get($url, $this->signAuth->handel([
            'file_id' => $fileId
        ]));
    }
}