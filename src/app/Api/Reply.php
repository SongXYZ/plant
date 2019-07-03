<?php
namespace App\Api;

use PhalApi\Api;

class Reply extends Api
{
    public function getRules()
    {
        return array(
            'addReply' => array(
                'uid' => array('name' => 'uid'),
                'did' => array('name' => 'did'),
                'rcontent' => array('name' => 'rcontent'),
            ),
            'showReply' => array(
                'did' => array('name' => 'did')
            ),
            'praise' => array(
                'rid' => array('name' => 'rid')
            ),
            'myReply' => array(
                'uid' => array('name' => 'uid')
            )
        );
    }

    /**
     * 发表评论
     */
    public function addReply()
    {
        $domain = new \App\Domain\Reply();
        $rs = $domain->addReply($this);
        return $rs;
    }

    /**
     * 显示评论
     */
    public function showReply()
    {
        $domain = new \App\Domain\Reply();
        $rs = $domain->showReply($this->did);
        return $rs;
    }

    /**
     * 赞评论
     */
    public function praise()
    {
        $domain = new \App\Domain\Reply();
        $rs = $domain->praise($this->rid);
        return $rs;
    }

    /**
     * 我的回复
     */
    public function myReply()
    {
        $domain = new \App\Domain\Reply();
        $rs = $domain->myReply($this->uid);
        return $rs;
    }
}