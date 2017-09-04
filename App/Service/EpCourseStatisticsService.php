<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 16:26
 */

namespace App\Service;


use App\Repository\CourseDAO;
use App\Repository\EpCourseStatisticsDAO;

class EpCourseStatisticsService
{
    protected $courseDAO;

    protected $epCourseStatisticsDAO;

    public function __construct()
    {
        $this->courseDAO = new CourseDAO();
        $this->epCourseStatisticsDAO = new EpCourseStatisticsDAO();
    }

    public function test()
    {
        echo 'Hello World';
    }

    public function decreaseKnowledgeNums()
    {
        $courses = $this->courseDAO->findCoursesByExamSyllabusId($id);
        foreach ($courses as $course) {
            $this->epCourseStatisticsDAO->decreaseKnowledgeNumsByCourseId($course['id']);
        }
    }

    public function increaseKnowledgeNums()
    {
        $courses = $this->courseDAO->findCoursesByExamSyllabusId($id);
        foreach ($courses as $course) {
            $this->epCourseStatisticsDAO->increaseKnowledgeNumsByCourseId($course['id']);
        }
    }
}