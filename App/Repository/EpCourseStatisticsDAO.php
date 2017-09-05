<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/4
 * Time: 10:11
 */

namespace App\Repository;

use App\Util\DbFactory;

class EpCourseStatisticsDAO
{
    public function increaseKnowledgeNumsByCourseId($courseId)
    {
        $sql = "UPDATE epiphany.`epi_course_statistics` SET knowledge_nums=knowledge_nums+1 
WHERE course_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }

    public function decreaseKnowledgeNumsByCourseId($courseId)
    {
        $sql = "UPDATE epiphany.`epi_course_statistics` SET knowledge_nums=knowledge_nums-1 
WHERE course_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }

    public function updateKnowledgeNumsByCourseId($courseId, $knowledgeNums)
    {
        $sql = "UPDATE epiphany.`epi_course_statistics` SET knowledge_nums={$knowledgeNums}
WHERE course_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }

    public function findOneByCourseId($courseId)
    {
        $sql = "SELECT * FROM epiphany.`epi_course_statistics` WHERE course_id={$courseId}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }

    public function insert($courseId, $knowledgeNums)
    {
        $sql = "INSERT INTO epiphany.epi_course_statistics(`course_id`, `knowledge_nums`) 
VALUES ({$courseId},{$knowledgeNums})";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }
}