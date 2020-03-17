<?php
/**
 * 请求类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 16:24
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

class Request
{
    /**
     * GET 请求
     * @param $url
     * @param $params
     * @param $header
     * @return bool|mixed
     */
    public static function get($url, $params = [], $header = [])
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        //参数处理
        $paramStr = http_build_query($params);
        if (strpos($url, '?') === false) {
            $url .= '?' . $paramStr;
        } else {
            $url .= '&' . $paramStr;
        }
        //header
        $headerArr = [];
        foreach ($header as $k => $v) {
            $headerArr[] = $k . ':' . $v;
        }
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headerArr);
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }

    /**
     * POST 请求
     * @param string $url
     * @param array $params
     * @param array $header
     * @return string content
     */
    public static function post($url, $params, $header = [])
    {
        $oCurl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        //header
        $headerArr = [];
        foreach ($header as $k => $v) {
            $headerArr[] = $k . ':' . $v;
        }
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headerArr);
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($oCurl, CURLOPT_POST, true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($params));
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }
}