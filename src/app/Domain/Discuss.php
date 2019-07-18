<?php
namespace App\Domain;

class Discuss
{
    /**
     * 发表评论
     */
    public function addDiscuss($data, $discussimage)
    {
        $model = new \App\Model\Discuss();
        $data = \App\obj_array($data);
        unset($data['file']);  // 将file弹出数组
        $data['discussimage'] = $discussimage;
        // return $data;
        $rs = $model->addDiscuss($data);
        return $rs;
    }

    /**
     * 显示评论
     */
    public function showDiscuss()
    {
        $model = new \App\Model\Discuss();
        $rs= $model->showDiscuss();
        return $rs;
    }

    /**
     * 我的评论
     */
    public function myDiscuss($uid)
    {
        $model = new \App\Model\Discuss();
        $rs= $model->myDiscuss($uid);
        return $rs;
    }
}