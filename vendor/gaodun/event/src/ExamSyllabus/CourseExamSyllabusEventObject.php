<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/1
 * Time: 11:58
 */

namespace Gaodun\Event\ExamSyllabus;


class CourseExamSyllabusEventObject
{
    /**
     * @var string 操作方法[change]
     */
    public $action;

    /**
     * @var int 考纲id
     */
    public $id;

    /**
     * @var int 课程id
     */
    public $courseId;

    /**
     * @var int 知识点数量（考纲第三级）
     */
    public $knowledgeNums;

    public function __construct($action, $id, $courseId, $knowledgeNums)
    {
        $this->action = $action;
        $this->id = $id;
        $this->courseId = $courseId;
        $this->knowledgeNums = $knowledgeNums;
    }
}