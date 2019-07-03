<?php
namespace App\Domain;

class PlantInfo
{
    /**
     * 搜索
     */
    public function search($plantname)
    {
        $model = new \App\Model\PlantInfo();
        $rs = $model->search($plantname);
        return $rs;
    }
}