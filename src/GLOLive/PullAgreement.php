<?php


namespace GLOLive;

use GLOLive\Utils\Request;

class PullAgreement extends Base
{
    const STUDENT_ROLE = 0;
    const TEACHER_ROLE = 1;

    /**
     * 获取唤起客户端地址
     * @param $classID int 北斗直播课节id
     * @param $userID string 业务方用户id
     * @param $userRole int 业务方用户id
     * @param $headImg string 讲师头像地址
     * @param $userName string 用户名
     * @return bool|mixed
     */
    public function GetAgreementUrl($classID,$userID,$userRole,$headImg,$userName,$teacherName=''){
        $url = sprintf("%s/live/pull/agreement", $this->url);
        $query = [
            'class_id' => $classID,
            'user_id'=>$userID,
            'user_role'=>$userRole,
            'head_img'=>$headImg,
            'user_name'=>$userName,
        ];
        if (!empty($teacherName)){
            $query['teacher_name'] = $teacherName;
        }
        return Request::get($url, $this->signAuth->handel($query));
    }


    /**
     * 获取唤起讲师端地址
     * @param $classID int 北斗直播课节id
     * @param $userID string 业务方用户id
     * @param $headImg string 讲师头像地址
     * @param $userName string 用户名
     * @return bool|mixed
     */
    public function GetTeacherAgreementUrl($classID,$userID,$headImg,$userName){
        return $this->GetAgreementUrl($classID,$userID,self::TEACHER_ROLE,$headImg,$userName);
    }

    /**
     * 获取唤起用户端地址
     * @param $classID int 北斗直播课节id
     * @param $userID string 业务方用户id
     * @param $headImg string 讲师头像地址
     * @param $userName string 用户名
     * @param $teacherName string 讲师名称
     * @return bool|mixed
     */
    public function GetStudentAgreementUrl($classID,$userID,$headImg,$userName,$teacherName){
        return $this->GetAgreementUrl($classID,$userID,self::STUDENT_ROLE,$headImg,$userName,$teacherName);
    }



}