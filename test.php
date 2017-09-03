<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 18:35
 */

require_once './vendor/autoload.php';
error_reporting(0);

use App\Util\DbFactory;

try {
    $rs = DbFactory::shared()->query("SELECT * FROM gaodun.gd_course WHERE id=2977");
    var_dump($rs);exit;
} catch (\Exception $e) {
    echo $e->getMessage();
    return;
}