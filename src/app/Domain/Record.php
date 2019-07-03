<?php
namespace App\Domain;

class Record
{
    /**
     * 显示用户识别记录
     */
    public function showRecord($uid)
    {
        $model = new \App\Model\Record();
        $rs = $model->showRecord($uid);
        return $rs;
    }

    /**
     * 添加用户识别记录
     */
    public function addRecord($data, $recordimage)
    {
        $model = new \App\Model\Record();
        $data = \App\obj_array($data);
        unset($data['file']);  // 将file弹出数组
        $data['recordimage'] = $recordimage;
        // return $data;
        $rs = $model->addRecord($data);
        return $rs;
    }

    /**
     * 美图部分，输出展示
     */
    public function showAllRecord()
    {
        $model = new \App\Model\Record();
        $rs = $model->showAllRecord();
        return $rs;
    }

    /**
     * 赞美图
     */
    public function praiseRecord($reid)
    {
        // return $did;
        $model = new \App\Model\Record();
        $rs = $model->praiseRecord($reid);
        return $rs;
    }

    /**
     * 删除用户识花记录
     */
    public function delRecord($reid)
    {
        // return $did;
        $model = new \App\Model\Record();
        $rs = $model->delRecord($reid);
        return $rs;
    }
}