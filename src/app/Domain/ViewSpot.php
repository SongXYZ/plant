<?php
namespace App\Domain;

class ViewSpot
{
    /**
     * 返回景点信息列表
     */
    public function viewList()
    {
        $model = new \App\Model\ViewSpot();
        $rs = $model->viewList();
        return $rs;
    }
}