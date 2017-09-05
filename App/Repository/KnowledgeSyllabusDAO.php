<?php
/**
 * Created by PhpStorm.
 * Date: 2017/9/2
 * Time: 17:11
 */

namespace App\Repository;

use App\Util\DbFactory;

class KnowledgeSyllabusDAO
{
    public function findBySyllabusIdAndLevel($syllabusId, $level)
    {
        $sql = "SELECT * FROM gaodun.`gd_knowledge_syllabus` 
WHERE sid={$syllabusId} AND `level`={$level}";
        $result = DbFactory::shared()->query($sql);
        return $result;
    }
}