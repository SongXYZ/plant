<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class PlantInfo extends NotORM
{
    /**
     * 搜索
     */
    public function search($plantname)
    {
        $orm = $this->getORM();
        // pname,alias,engname,family,genus,des,careknowledge,feature
        $rs = $orm->select('pname','alias','engname','family','genus','des','careknowledge','feature')->where('pname', $plantname)->fetchOne();
        return $rs;
    }
}