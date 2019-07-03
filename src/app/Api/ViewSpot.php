<?php
namespace App\Api;

use PhalApi\Api;

class ViewSpot extends Api
{
    public function getRules() {
        return array(
            'viewDetail' => array(
                "vsid" => array('name' => 'vsid'),
            )
            
        );
    }

    /**
     * 返回景点信息列表
     */
    public function viewList()
    {
        // return array('code' => '1');
        $domain = new \App\Domain\ViewSpot();
        $rs = $domain->viewList();
        return $rs;
    }
}