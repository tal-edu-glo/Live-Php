<?php
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Glo\Live\Test', __DIR__);

$appKey = '92cae9410c4f8aeb';
$appSecret = '92cae9410c4f8aebfd294e29935f697f';
$testAuth = new Glo\Live\Auth\Signature($appKey, $appSecret);