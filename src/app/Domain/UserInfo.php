<?php
namespace App\Domain;

class UserInfo
{
    /**
     * 注册
     */
    public function register($data) {
        // uname pswd
        $model = new \App\Model\UserInfo();
        $data = \App\obj_array($data);  // 对象->数组
        $rs = $model->register($data);
        return $rs;
    }

    /**
     * 登录
     */
    public function login($data) {
        // uname pswd
       $model = new \App\Model\UserInfo();
       $data = \App\obj_array($data);
       $rs = $model->login($data);
       return $rs;
    }

    /**
     * 设置用户图像
     */
    public function setUserPhoto($uid, $userphoto)
    {
        $model = new \App\Model\UserInfo();
        // return $uid;
        $userphoto = array('userphoto' => $userphoto);
        $rs = $model->setUserPhoto($uid, $userphoto);
        return $rs;
    }
}