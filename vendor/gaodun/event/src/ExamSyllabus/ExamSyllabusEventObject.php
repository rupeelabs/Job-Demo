<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/1
 * Time: 11:58
 */

namespace Gaodun\Event\ExamSyllabus;


class ExamSyllabusEventObject
{
    /**
     * @var string 操作方法[attach/del]
     */
    public $action;

    /**
     * @var int 考纲id
     */
    public $id;

    /**
     * @var int 考纲条目id
     */
    public $contentId;

    /**
     * @var int 考纲层级
     */
    public $level;

    public function __construct($action, $id, $contentId, $level)
    {
        $this->action = $action;
        $this->id = $id;
        $this->contentId = $contentId;
        $this->level = $level;
    }
}