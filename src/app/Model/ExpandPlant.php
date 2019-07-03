<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class ExpandPlant extends NotORM
{
    /**
     * 上传扩展图片
     */
    public function addPlantPhoto($data)
    {
        $orm = $this->getORM();
        $rs = $orm->insert($data);
        if($rs != NULL)
        {
            return array('code' => '1');
        }else{
            return array('code' => '0');
        }
    }
}