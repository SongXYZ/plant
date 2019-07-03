<?php
namespace App;

function hello() {
    return 'Hey, man~';
}

function obj_array($data)
{
    $rs = array();
    foreach($data as $key=>$val)
    {
        $rs[$key] = $val;
    }
    return $rs;
}