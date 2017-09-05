<?php
/**
 * Created by PhpStorm.
 * Date: 2017/8/31
 * Time: 18:00
 */

namespace Gaodun\Event\ExamSyllabus;


use Symfony\Component\EventDispatcher\Event;

class ExamSyllabusUpdateEvent extends Event
{
    const NAME = 'exam.syllabus.update';

    private $object;

    public function __construct(ExamSyllabusEventObject $object)
    {
        $this->object = $object;
    }

    public function getObject()
    {
        return $this->object;
    }
}