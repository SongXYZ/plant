<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Discuss extends NotORM
{
    /**
     * 发表评论
     */
    public function addDiscuss($data)
    {
        // array('uid'=>'', 'content'=>'', discussimage'=>'')
        $orm = $this->getORM();
        $rs = $orm->insert($data);
        if($rs != NULL)
        {
            return array('code' => '1');
        }else{
            return array('code' => '0');
        }
    }

    /**
     * 显示评论
     */
    public function showDiscuss()
    {
        $orm = $this->getORM();
        // uname,userphoto,did,conntent,discussimage,discusstime
        $sql = "select ui.uname,ui.userphoto,dis.did,dis.content,dis.discussimage,dis.discusstime from discuss dis join userinfo ui on dis.uid=ui.uid order by dis.discusstime desc limit 30";
        $rs = $orm->queryAll($sql);
        return $rs;
    }

    /**
     * 我的评论
     */
    public function myDiscuss($uid)
    {
        $orm = $this->getORM();
        $rs = $orm->select('did', 'content', 'discussimage', 'discusstime')->where('uid', $uid)->order('discusstime desc')->fetchAll();
        return $rs;
    }
}
