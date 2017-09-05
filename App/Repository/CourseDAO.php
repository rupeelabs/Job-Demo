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

    /**
     * 根据网课类型查找课程列表
     * @param $type 3为ep课程
     * @return mixed
     */
    public function findCoursesByType($type)
    {
        $sql = "SELECT * FROM gaodun.gd_course WHERE istasks={$type}";
        $result= DbFactory::shared()->query($sql);
        return $result;
    }
}