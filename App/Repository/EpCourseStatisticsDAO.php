<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/4
 * Time: 10:11
 */

namespace App\Repository;


class EpCourseStatisticsDAO
{
    public function increaseKnowledgeNumsByCourseId($courseId)
    {
        $sql = "UPDATE `epi_course_statistics` SET knowledge_sum=knowledge_nums+1 
WHERE coruse_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }

    public function decreaseKnowledgeNumsByCourseId($courseId)
    {
        $sql = "UPDATE `epi_course_statistics` SET knowledge_sum=knowledge_nums-1 
WHERE coruse_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }
}