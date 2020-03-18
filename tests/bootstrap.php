<?php
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Glo\Live\Test', __DIR__);

$appKey = 'uuuuuuuuuu7777';
$appSecret = 'ef8d74a80534e63d3ac28e0247cda5b4';
$testAuth = new Glo\Live\Auth\Signature($appKey, $appSecret);