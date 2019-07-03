<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class PlantInfo extends Api {
    public function getRules() {
        return array(
            'search' => array(
                'plantname' => array('name' => 'plantname', 'require' => true),
            ),
        );
    }

    /**
     * 搜索
     */
    public function search()
    {
        $domain = new \App\Domain\PlantInfo();
        $rs = $domain->search($this->plantname);
        return $rs;
    }
} 
