<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Record extends NotORM
{
    /**
     * 显示用户识别记录
     */
    public function showRecord($uid, $limit=40)
    {
         // array('uid'=>'')
         $orm = $this->getORM();
         $rs = $orm->select('recordimage', 'plantname', 'praisecount', 'recordtime')->where('uid = ? AND isdel = ?', $uid, '0')->limit($limit)->order('recordtime desc')->fetchAll();
         return $rs;
    }

    /**
     * 添加用户识别记录
     */
    public function addRecord($data)
    {
        // array('plantname'=>'', 'recordimage'=>'')
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
     * 美图部分，输出展示
     */
     public function showAllRecord()
     {
        $orm = $this->getORM();
        // uname,userphoto,reid,recordimage,plantname,praisecount,recordtime
        $sql = "select ui.uname,ui.userphoto,re.reid,re.plantname,re.recordimage,re.praisecount,re.recordtime from record re join userinfo ui on re.uid=ui.uid where re.isdel='0' order by re.recordtime desc limit 40";
        $rs = $orm->queryAll($sql);
        return $rs;
     }

     /**
     * 赞美图
     */
    public function praiseRecord($reid)
    {
        $orm = $this->getORM();
        // update reply set praisecount = praisecount + 1 where rid=5
        // 返回影响的行数
        $rs = $orm->where('reid', $reid)->update(array('praisecount' => new \NotORM_Literal("praisecount + 1")));
        if($rs != 1){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }

    /**
     * 删除用户识花记录
     */
    public function delRecord($reid)
    {
        $orm = $this->getORM();
        // update reply set praisecount = praisecount + 1 where rid=5
        // 返回影响的行数
        $rs = $orm->where('reid', $reid)->update(array('isdel' => '1'));
        if($rs != 1){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }
}
