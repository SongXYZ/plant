<?php
namespace App\Domain;

class Reply
{
    /**
     * 发表评论
     */
    public function addReply($data)
    {
        $model = new \App\Model\Reply();
        $data = \App\obj_array($data);
        // return $data;
        $rs = $model->addReply($data);
        return $rs;
    }

    /**
     * 显示评论
     */
    public function showReply($did)
    {
        // return $did;
        $model = new \App\Model\Reply();
        $rs = $model->showReply($did);
        return $rs;
    }

    /**
     * 赞评论
     */
    public function praise($rid)
    {
        // return $did;
        $model = new \App\Model\Reply();
        $rs = $model->praise($rid);
        return $rs;
    }

    /**
     * 我的回复
     */
    public function myReply($uid)
    {
        $model = new \App\Model\Reply();
        $rs = $model->myReply($uid);
        return $rs;
    }
}