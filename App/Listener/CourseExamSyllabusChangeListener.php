<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 16:31
 */

namespace App\Listener;


use App\Repository\CourseDAO;
use App\Service\EpCourseStatisticsService;
use Symfony\Component\EventDispatcher\Event;

class CourseExamSyllabusChangeListener
{
    public $epCourseStatisticsService;

    public function test(Event $event)
    {
        var_dump($event->getObject());
    }

    public function __construct()
    {
        $this->epCourseStatisticsService = new EpCourseStatisticsService();
    }

    public function handle(Event $event)
    {
        $object = $event->getObject();
        $action = $object->action;
        $id = $object->id;
        $courseId = $object->courseId;
        $knowledgeNums = $object->knowledgeNums;

        $this->epCourseStatisticsService
            ->updateKnowledgeNumsByCourseId($courseId, $knowledgeNums);
    }
}