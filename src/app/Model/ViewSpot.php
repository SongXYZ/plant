<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class ViewSpot extends NotORM
{
    /**
     * 返回景点信息列表
     */
    public function viewList()
    {
        $orm = $this->getORM();
        $list = array(0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550);
        $i = $list[rand(0, 11)];
        // return $i;
        // vsid, descname, realcity, city, photo, ranking, recommendplaying, lat, lng, summarydesc, address, openinghours, ticket, trafficguide
        $rs = $orm->select('*')->limit($i, 50)->fetchAll();
        return $rs;
    }
}