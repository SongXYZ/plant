<?php
namespace App\Api\Examples;

use PhalApi\Api;

/**
 * 文件上传示例
 * 
 * 测试页面： http://localhost/upload.html
 *
 * @author dogstar 20170611
 */

class Upload extends Api {

    public function getRules() {
        return array(
            'go' => array(
                'file' => array(
                    'name' => 'file',        // 客户端上传的文件字段
                    'type' => 'file', 
                    'require' => true, 
                    'max' => 2097152,        // 最大允许上传2M = 2 * 1024 * 1024, 
                    'range' => array('image/jpeg', 'image/png'),  // 允许的文件格式
                    'ext' => 'jpeg,jpg,png', // 允许的文件扩展名 
                    'desc' => '待上传的图片文件',
                ),
            ),
        );
    }   

    /**
     * 图片文件上传
     * @desc 只能上传单个图片文件
     */
    public function go($filebase64)
    {
        $imageName = "25220_".date("His",time())."_".rand(11,9999).'.jpeg';  // 图片名称
        $path = sprintf('%s/public/uploads/', API_ROOT);  // 文件夹名
        if(!is_dir($path))
        {
            //判断目录是否存在 不存在就创建
            mkdir($path,0777,true);
        }
        $imageSrc= $path."/". $imageName;  // 图片路径
       // if (strstr($filebase64,",")){
       //     $image = explode(',', $filebase64);
       //     $image = $image[1];
       // }
        $r = file_put_contents($imageSrc, base64_decode($filebase64));
        if(!$r)
        {
            return array('code' => '0');
        }else{
            return $imageName;
        }
    }

    public function gogo($file)
    {
        // $rs = array('code' => 0, 'url' => '');

        $tmpName = $file['tmp_name'];

        $name = md5($file['name'] . $_SERVER['REQUEST_TIME']).'.jpeg';
        // $ext = strrchr($file['name'], '.');
        $uploadFolder = sprintf('%s/public/uploads/', API_ROOT);
        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0777);
        }

        $imgPath = $uploadFolder . $name;
        if (move_uploaded_file($tmpName, $imgPath)) {
            // $rs['url'] = sprintf('http://%s/uploads/%s%s', $_SERVER['SERVER_NAME'], $name, $ext);
            return $name;
        }else{
            return array('code' => '0');
        }
    }
}
