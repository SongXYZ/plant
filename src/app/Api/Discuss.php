<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户评论模块
 */
class Discuss extends Api
{
    public function getRules()
    {
        return array(
            "addDiscuss" => array(
                'uid' => array('name' => 'uid'),
                'content' => array('name' => 'content'),
		'filebase64' => array('name' => 'file'),
		// 'filebase64' => array(
                //    'name' => 'file',        // 客户端上传的文件字段
                //    'type' => 'file',
		//    'require' => true,
	    	// )
            ),
            'myDiscuss' => array(
                'uid' => array('name' => 'uid')
	    ),
	    'test' => array(
	    	'file' => array(
		    'name' => 'file',
		    'type' => 'file',
		    'require' => true,
		)
	    )
        );
    }
    
    /**
     * 
     */
    public function test()
    {
	$upload_file = new \App\Api\Examples\Upload();
	$imageName = $upload_file->gogo($this->file);
	return $imageName;
    }

    /**
     * 发表评论
     */
    public function addDiscuss()
    {
        $upload_file = new \App\Api\Examples\Upload();
        $imageName = $upload_file->go($this->filebase64);  // 返回文件名
        // return $imageName;
        $discussimage = sprintf('http://fangyiming.natapp1.cc/plant/public/uploads/%s', $imageName);
        $domain = new \App\Domain\Discuss();
        $rs = $domain->addDiscuss($this, $discussimage);
        return $rs;
    }

    /**
     * 显示评论
     */
    public function showDiscuss()
    {
        $domain = new \App\Domain\Discuss();
        $rs = $domain->showDiscuss();
        return $rs;
    }

    /**
     * 我的评论
     */
    public function myDiscuss()
    {
        $domain = new \App\Domain\Discuss();
        $rs = $domain->myDiscuss($this->uid);
        return $rs;
    }
}
