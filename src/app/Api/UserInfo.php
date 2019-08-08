<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class UserInfo extends Api {
    public function getRules() {
        return array(
            'register' => array(
                'uname' => array('name' => 'uname', 'require' => true, 'min' => 1, 'max' => 50, 'desc' => '用户名'),
                // 'pswd' => array('name' => 'pswd', 'require' => true, 'min' => 6, 'max' => 20, 'desc' => '密码'),
                'pswd' => array('name' => 'pswd'),
            ),
            'login' => array(
                'uname' => array('name' => 'uname', 'require' => true, 'min' => 1, 'max' => 50, 'desc' => '用户名'),
                'pswd' => array('name' => 'pswd', 'require' => true, 'min' => 6, 'max' => 20, 'desc' => '密码'),
            ),
            'setUserPhoto' => array(
                // 'file' => array(
                //     'name' => 'file',        // 客户端上传的文件字段
                //     'type' => 'file', 
                //     'require' => true,
                // ),
                'filebase64' => array('name' => 'file'),
                'uid' => array('name' => 'uid')
	    ),
	    'up' => array(
                'file' => array(
                'name' => 'file',        // 客户端上传的文件字段
                'type' => 'file',
                'require' => true,
            ),
            )
        );
    }

    /**
     * 注册
     */
    public function register() {
        $domain = new \App\Domain\UserInfo();
        $this->pswd = md5($this->pswd);
        $rs = $domain->register($this);
        return $rs;
    }

    /**
     * 登录
     */
    public function login() {
        $domain = new \App\Domain\UserInfo();
        $this->pswd = md5($this->pswd);
        $rs = $domain->login($this);
        return $rs;
    }

    /**
     * 设置用户图像
     */
    public function setUserPhoto()
    {
        $upload_file = new \App\Api\Examples\Upload();
        $imageName = $upload_file->go($this->filebase64);  // 返回文件名
        // $imageName = $upload_file->gogo($this->file);  // 返回文件名
        $userphoto = sprintf('http://fangyiming.natapp1.cc/plant/public/uploads/%s', $imageName);
        $domain = new \App\Domain\UserInfo();
        $rs = $domain->setUserPhoto($this->uid, $userphoto);
        return $rs;
    }

    /**
     * 测试上传文件
     */
    public function up()
    {
        $upload_file = new \App\Api\Examples\Upload();
        $imageName = $upload_file->gogo($this->file);  // 返回文件名
        $image = sprintf('http://fangyiming.natapp1.cc/plant/public/testimage/%s', $imageName);
        return array('image' => $image);
    }
} 
