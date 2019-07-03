<?php
namespace App\Api;

use PhalApi\Api;

class PlantClass extends Api
{
    public function getRules()
    {
        return array(
            'showPlantClass' => array(
                'cid' => array('name' => 'cid', 'require' => true),
            ),
        );
    }

    /**
     * 返回某类植物信息
     */
    public function showPlantClass()
    {
        $domain = new \App\Domain\PlantClass();
        $rs = $domain->showPlantClass($this->cid);
        return $rs;
    }

}



