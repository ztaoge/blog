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
    $uuid = (int)$str;
    return $uuid;
}

function checkLogin() {

}