<?php

namespace GLOLive;


use GLOLive\Utils\Request;

class FileConvert extends Base
{

    /**
     * 课件上传
     * 提供课件上传和转换服务，转换后统一为图片形式的zip压缩包，
     * 转换课件格式支持主流的pdf、word、ppt。
     * @param $fileName string 文件名称
     * @param $filePath string 需要转码的文件地址
     * @return string
     */
    public function upload($fileName, $filePath)
    {
        $url = sprintf("%s/pan/convert/upload", $this->url);
        return Request::post($url, $this->signAuth->handel([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]));
    }

    /**
     * 课件获取
     * 该接口主要提供获取课件转换状态和转换结果，转换结果包含课件创建时间、
     * 转换后地址、预览地址、课件名称等基本信息。
     * @param $fileID int 课件id，为课件上传返回的课件ID
     * @return bool|mixed
     */
    public function get($fileID)
    {
        $url = sprintf("%s/pan/convert/get", $this->url);
        return Request::get($url, $this->signAuth->handel([
            'file_id' => $fileID,
        ]));
    }

}