<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class ExpandPlant extends Api {
    public function getRules() {
        return array(
            'addPlantPhoto' => array(
                "uid" => array('name' => 'uid'),
                "expandplantname" => array('name' => 'plantname', 'min' => 1, 'max' => 50,),
		"plantbase64" => array('name' => 'plantbase64')
		// 'plantbase64' => array(
                //    'name' => 'plantbase64',        // 客户端上传的文件字段
                //    'type' => 'file',
                //    'require' => true,
                // )
            )
            
        );
    }


    /**
     * 上传扩展图片
     * 1 判断数据库是否有此植物
     */
    public function addPlantPhoto()
    {
	// base64转图片
        // API_ROOT /var/www/html/plant/public/..
        $imageName = "25220_".date("His",time())."_".rand(1111,9999).'.jpeg';  // 图片名称
        $path = sprintf('%s/public/expandphoto/'.$this->expandplantname.'/', API_ROOT);  // 文件夹名
        if(!is_dir($path))
        {
            //判断目录是否存在 不存在就创建
            mkdir($path,0777,true);
        }
        $imageSrc= $path . $imageName;  // 图片路径
        // return $imageSrc;
        $r = file_put_contents($imageSrc, base64_decode($this->plantbase64));
        if(!$r)
        {
            return array('code' => '0');
        }else{
            $expandplantpath = sprintf('http://fangyiming.natapp1.cc/plant/public/expandphoto/%s/%s', $this->expandplantname, $imageName);
            // return $expandplantpath;
            $domain = new \App\Domain\ExpandPlant();
            $rs = $domain->addPlantPhoto($this->uid, $this->expandplantname, $expandplantpath);
            return $rs;
        }
    }
} 
