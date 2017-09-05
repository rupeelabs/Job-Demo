<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/31
 * Time: 18:00
 */

namespace Gaodun\Event\ExamSyllabus;


use Symfony\Component\EventDispatcher\Event;

class CourseExamSyllabusChangeEvent extends Event
{
    const NAME = 'course.exam.syllabus.update';

    private $object;

    public function __construct(CourseExamSyllabusEventObject $object)
    {
        $this->object = $object;
    }

    public function getObject()
    {
        return $this->object;
    }
}