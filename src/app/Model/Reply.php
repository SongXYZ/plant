<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Reply extends NotORM
{
    /**
     * 发表评论
     */
    public function addReply($data)
    {
        // array('uid'=>'', 'did'=>'', 'rcontent'=>'')
        $orm = $this->getORM();
        $rs = $orm->insert($data);
        if($rs != NULL){
            return array('code' => '1');
        }else{
            return array('code' => '0');
        }
    }

    /**
     * 显示评论
     */
    public function showReply($did)
    {
         $orm = $this->getORM();
         // uname,userphoto,rcontent,praisecount,replytime
         $sql = "select ui.uname,ui.userphoto,re.rid,re.rcontent,re.praisecount,re.replytime from reply re join userinfo ui on re.did=:did and re.uid=ui.uid order by re.replytime desc";
         $params = array(":did" => $did);
         $rs = $orm->queryAll($sql, $params);
         return $rs;
    }

    /**
     * 赞评论
     */
    public function praise($rid)
    {
        $orm = $this->getORM();
        // update reply set praisecount = praisecount + 1 where rid=5
        // 返回影响的行数
        $rs = $orm->where('rid', $rid)->update(array('praisecount' => new \NotORM_Literal("praisecount + 1")));
        if($rs != 1){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }

    /**
     * 我的回复
     */
    public function myReply($uid)
    {
        $orm = $this->getORM();
        $sql = "select re.rcontent,re.praisecount,re.replytime,d.content,d.discussimage,ui.uname,ui.userphoto from userinfo ui,reply re join discuss d on re.did=d.did where re.uid=:uid and ui.uid=d.uid";
        $params = array(":uid" => $uid);
        $rs = $orm->queryAll($sql, $params);
        return $rs;
    }
}
