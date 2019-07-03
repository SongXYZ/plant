<?php
namespace App\Domain;

class ExpandPlant
{
    /**
     * 上传扩展图片
     */
    public function addPlantPhoto($uid, $expandplantname, $expandplantpath)
    {
        $model = new \App\Model\ExpandPlant();
        $data = array(
            'uid' => $uid,
            'expandplantname' => $expandplantname,
            'expandplantpath' => $expandplantpath
        );
        // return $data;
        $rs = $model->addPlantPhoto($data);
        return $rs;
    }
}