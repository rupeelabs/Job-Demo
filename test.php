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
    $rs = DbFactory::shared()->query("INSERT INTO epiphany.epi_course_statistics(course_id,knowledge_sum) VALUES(2977, 2)");
    var_dump($rs);exit;
} catch (\Exception $e) {
    echo $e->getMessage();
    return;
}