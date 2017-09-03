<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 17:11
 */

namespace App\Repository;

use App\Util\DbFactory;

class CourseDAO
{
    public function findCoursesByExamSyllabusId($id)
    {
        $sql = "SELECT id FROM gaodun.gd_course WHERE examination_syllabus_id={$id}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }
}