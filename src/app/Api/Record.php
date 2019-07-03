<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 识别记录模块
 */
class Record extends Api
{
    public function getRules()
    {
        return array(
            "showRecord" => array(
                'uid' => array('name' => 'uid'),
            ),
            "addRecord" => array(
                'uid' => array('name' => 'uid'),
                'plantname' => array('name' => 'plantname'),
                'filebase64' => array('name' => 'file'),
            ),
            "praiseRecord" => array(
                'reid' => array('name' => 'reid'),
            ),
            "delRecord" => array(
                'reid' => array('name' => 'reid'),
            )
        );
    }

    /**
     * 显示用户识别记录
     */
    public function showRecord()
    {
        $domain = new \App\Domain\Record();
        $rs = $domain->showRecord($this->uid);
        return $rs;
    }

    /**
     * 添加用户识别记录
     */
    public function addRecord()
    {
        $upload_file = new \App\Api\Examples\Upload();
        $recordimage = $upload_file->go($this->filebase64);  // 获取到上传的文件路径
        // return $recordimage;
        $domain = new \App\Domain\Record();
        $rs = $domain->addRecord($this, $recordimage['url']);
        return $rs;
    }

    /**
     * 美图部分，输出展示
     */
    public function showAllRecord()
    {
        $domain = new \App\Domain\Record();
        $rs = $domain->showAllRecord();
        return $rs;
    }

    /**
     * 赞美图
     */
    public function praiseRecord()
    {
        $domain = new \App\Domain\Record();
        $rs = $domain->praiseRecord($this->reid);
        return $rs;
    }

    /**
     * 删除用户识花记录
     */
    public function delRecord()
    {
        // return $did;
        $domain = new \App\Domain\Record();
        $rs = $domain->delRecord($this->reid);
        return $rs;
    }

}