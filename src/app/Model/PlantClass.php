<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class PlantClass extends NotORM
{
    /**
     * 返回某类植物信息
     */
    public function showPlantClass($cid)
    {
        $orm = $this->getORM();
        // pname,alias,engname,family,genus,plantimage,des,careknowledge,feature
        $rs = $orm->select('pcid','pname','alias','engname','family','genus','plantimage','des','careknowledge','feature')->where('cid', $cid)->fetchAll();
        return $rs;
    }
}


