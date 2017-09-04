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

class ExamSyllabusUpdateListener
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
        $contentId = $object->contentId;
        $level = $object->level;

        if ($level == 3) {
            switch ($action) {
                case 'del' :
                    $this->epCourseStatisticsService->decreaseKnowledgeNums();
                case 'attach' :
                    $this->epCourseStatisticsService->increaseKnowledgeNums();
            }
        }
    }
}