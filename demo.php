<?php
/**
 *
 * @author      Song Yingdong <songyingdong@100tal.com>
 * @time        2020/3/17 09:57
 *
 * @copyright   2018 好未来教育科技集团-GLO中台
 * @license     http://www.kmf.com license
 */

include_once "./src/Live.php";

$liveObj = new Live('d5c984d6d2b19aa7', '5f9709c7a4eea035e9ebb066f62be898');
echo $liveObj->replay(1798, 3000056);