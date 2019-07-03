<?php
namespace App\Domain;

class PlantClass
{
    /**
     * 返回某类植物信息
     */
    public function showPlantClass($cid)
    {
        $model = new \App\Model\PlantClass();
        $rs = $model->showPlantClass($cid);
        $i = 0;
        foreach($rs as $val)
        {
            $rs[0]['plantimage'] = "http://".$_SERVER['SERVER_NAME']."/plant/public/plantclass/".$val['plantimage'];
            $i++;
        }
        return $rs;
    }
}