# 北斗直播SDK

北斗API是基于北斗直播平台提供便捷接入、功能全面、性能稳定、方式灵活服务。您可以通过北斗API，依照文档与自己服务进行集成，定制属于您自己的直播服务。北斗API平台让您告别复杂的架构设计和编程开发，使您可以专注于业务逻辑实现及最终用户体验的提升。

## 简介

SDK 包含了直播课管理， 课件及唤起客户端协议等接口调用，以及接口验签的相关工作，您不需要再关注这部分的功能，只需要调用我们提供给您的方法即可实现。
## 使用
```shell script
composer require glo/live
```
```php
    /**
     * 添加直播
     * @param array $params
     * [
     *      'class_name'    string  直播课程名称
     *      'class_type'    int     直播类型 0大班,1小班,21v1,3公开课
     *      'start_time'    string  直播开始时间 1970-01-01 00:00:00
     *      'end_time'      string  直播结束时间 1970-01-01 00:02:00
     *      'class_number'  string  参与直播人数 活动/公开课建议填写 默认大班50
     *      'live_id'  int  业务传入的直播ID,相同class_type类型下live_id保证其唯一性
     * ]
     * @return bool|mixed
     */
    public function create($params = []){}

    /**
     * 编辑直播
     * @param array $params
     * [
     *      'class_id'      int     北斗直播课节id
     *      'class_name'    string  直播课程名称
     *      'class_type'    int     直播类型 0大班,1小班,21v1,3公开课
     *      'start_time'    string  直播开始时间 1970-01-01 00:00:00
     *      'end_time'      string  直播结束时间 1970-01-01 00:02:00
     *      'class_number'  string  参与直播人数 活动/公开课建议填写 默认大班50
     * ]
     * @return bool|mixed
     */
    public function edit($params = []){}

    /**
     * 获取回放地址
     * @param int $classId
     * @param int $userId
     * @return bool|mixed
     */
    public function replay($classId = 0, $userId = 0){}


```
[SDK文档](http://help.yeeaoo.com)   
## 详细功能介绍

### 直播管理
 - 添加直播
 - 修改直播
 - 删除直播
### 回放管理
 - 获取回放地址
### 课件转码
 - 课件上传 
 - 课件获取
### 客户端唤起
- 老师端唤起协议
- 学生端唤起协议

## 使用
>1、 使用此API前先联系客户经理开通权限

>2、获取API/SDK的使用权限信息Access Key

>3、 签名
```shell
$appKey = 'XXXXXX';
$appSecret = 'XXXXXXXXXXXX';
$testAuth = new Glo\Live\Auth\Signature($appKey, $appSecret);
```
>4、 访问接口
```shell
$liveObj = new LiveClass($testAuth);
$result = $liveObj->create([
   'live_id' => 1000,
   'class_name' => '测试直播',
   'class_type' => 0,
   'start_time' => '2030-01-01 00:00:00',
   'end_time' => '2030-01-01 23:00:00',
   'class_number' => 50
]);
```

### 运行单元测试

1. 执行`composer install`下载依赖的库
2. 设置系统环境变量

        export GLO_APP_KEY=xxxxx
        export GLO_APP_SECRET=xxxxx

3. 执行 `./vendor/bin/phpunit` 
