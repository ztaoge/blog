<?php

function stmt_filter($result = []){

}

function addWhere($sql, $array = []) {

}
//获取15位uuid
function getUuid() {
    $str = $_SERVER['REQUEST_TIME'];
    for($i = 0;$i<5;$i++) {
        $str .= rand(0,9);
    }
    $uuid = intval($str);
    return $uuid;
}

//获取当前域名
function getHost() {
    return $_SERVER['HTTP_HOST'];
}