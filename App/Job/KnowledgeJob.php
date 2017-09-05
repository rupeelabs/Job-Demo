<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/5
 * Time: 15:58
 */

namespace App\Job;


use App\Repository\CourseDAO;
use App\Repository\EpCourseStatisticsDAO;
use App\Repository\KnowledgeSyllabusDAO;
use App\Util\SentryNotify;

class KnowledgeJob extends AbstractJob
{
    public $courseDAO;
    public $knowledgeSyllabusDAO;
    public $epCourseStatisticsDAO;

    public function __construct()
    {
        $this->courseDAO = new CourseDAO();
        $this->knowledgeSyllabusDAO = new KnowledgeSyllabusDAO();
        $this->epCourseStatisticsDAO = new EpCourseStatisticsDAO();
    }

    public function run()
    {
        $courses = $this->courseDAO->findCoursesByType(3);
        foreach ($courses as $course) {
            if (!$course['examination_syllabus_id']) continue;
            $knowledges = $this->knowledgeSyllabusDAO
                ->findBySyllabusIdAndLevel(
                    $course['examination_syllabus_id'],
                    3
                );
            $knowledgeNums = count($knowledges);
            $courseStatistics = $this->epCourseStatisticsDAO
                ->findOneByCourseId($course['id']);
            if (empty($courseStatistics)) {
                $this->epCourseStatisticsDAO->insert($course['id'], $knowledgeNums);
            } else {
                if ($courseStatistics['knowledge_nums'] !== $knowledgeNums) {
                    SentryNotify::notify('知识点数量异常', $courseStatistics);
                }
                $this->epCourseStatisticsDAO
                    ->updateKnowledgeNumsByCourseId($course['id'], $knowledgeNums);
            }
        }
    }
}