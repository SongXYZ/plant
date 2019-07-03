<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class UserInfo extends NotORM
{
    /**
     * 注册
     */
    public function register($data)
    {
        // array('uname'=>'','pswd'=>'')
        $orm = $this->getORM();
        // 判断用户是否存在
        $rs = $orm->select('uid')->where('uname', $data['uname'])->fetchAll();
        if($rs != NULL)
        {
            return array('code' => '0', 'data' => '用户名已注册'); 
        }else{
            $rs = $orm->insert($data);
            $id = $orm->insert_id();
            if($rs != NULL)
            {
                return array('code' => '1', "data" => array('uid' => $id, 'uname'=>$data['uname'], 'userphoto'=>"http://fangyiming.natapp1.cc/plant/public/uploads/chushi.png", 'record'=>[]));
            }else{
                return array('code' => '0');
            }
        }
    }

    /**
     * 登录
     */
    public function login($data)
    {
        // array('uname'=>'','pswd'=>'')
        $orm = $this->getORM();
        $rs = $orm->select('uid', 'uname', 'userphoto')->where($data)->fetchOne(); // 没有返回false
        $record_model = new \App\Model\Record();
        if($rs == false)
        {
            return array('code' => '0');
        }else{
            $rs['record'] = $record_model->showRecord($rs['uid'], 4);
            return array('code' => '1', 'data' => $rs);
        }
    }

    /**
     * 设置用户图像
     */
    public function setUserPhoto($uid, $userphoto)
    {
        // uid array('userphoto' => $userphoto)
        $orm = $this->getORM();
        $data = array('uid' => $uid);
        $rs = $orm->where($data)->update($userphoto);
        if($rs === false){
            return array('code' => '0');
        }else{
            return array('code' => '1', $userphoto);
        }
    }
}
