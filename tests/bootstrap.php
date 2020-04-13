<?php
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Glo\Live\Test', __DIR__);

$appKey = getenv('GLO_APP_KEY', '');
$appSecret = getenv('GLO_APP_SECRET', '');
$testAuth = new Glo\Live\Auth\Signature($appKey, $appSecret);