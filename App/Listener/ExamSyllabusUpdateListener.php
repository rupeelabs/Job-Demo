<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 16:31
 */

namespace App\Listener;


use App\Repository\CourseDAO;
use Symfony\Component\EventDispatcher\Event;

class ExamSyllabusUpdateListener
{
    public $courseDAO;

    public function test(Event $event)
    {
        var_dump($event->getObject());
    }

    public function __construct()
    {
        $this->courseDAO = new CourseDAO();
    }

    public function handle(Event $event)
    {
        $object = $event->getObject();
        $action = $object->action;
        $id = $object->id;
        $contentId = $object->contentId;
        $level = $object->level;
        $courses = $this->courseDAO->findCoursesByExamSyllabusId($id);
        var_dump($courses);
        return ;
        if ($level == 3) {
            $courses = $this->courseDAO->findCoursesByExamSyllabusId($id);
            switch ($action) {
                case 'del' :
                    $a = 1;
                case 'attach' :

            }
        }
    }
}