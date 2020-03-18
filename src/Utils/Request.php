<?php
/**
 * 请求类
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/16 16:24
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 */

namespace Glo\Live\Utils;

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
        $curl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
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
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArr);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl);
        $errno = curl_errno($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if (intval($httpStatus["http_code"]) == 200) {
            return self::responseHandel($response);
        } else {
            return ['status' => $errno, 'message' => $error];
        }
    }

    /**
     * POST 请求
     * @param string $url
     * @param array $params
     * @param array $header
     * @return mixed
     */
    public static function post($url, $params, $header = [])
    {
        $curl = curl_init();
        if (stripos($url, "https://") !== false) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        //header
        $headerArr = [];
        foreach ($header as $k => $v) {
            $headerArr[] = $k . ':' . $v;
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArr);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl);
        $errno = curl_errno($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if (intval($httpStatus["http_code"]) == 200) {
            return self::responseHandel($response);
        } else {
            return ['status' => $errno, 'message' => $error];
        }
    }

    /**
     * 接口返回处理
     * @param $responseText
     * @return bool|mixed
     */
    public static function responseHandel($responseText)
    {
        if (!$responseText) {
            return true;
        }
        return json_decode($responseText, true);
    }
}