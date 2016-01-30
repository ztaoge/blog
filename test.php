<?php
require_once 'common/config/conf.php';
$db = new PDO(DSN, USER, PASSWD);
$values = [
    'name' => 'girl',
    'gender' => 'female',
];
$table = 'test';

//$sql = "INSERT INTO `{$table}` (";
//$sql .= implode(array_keys($values), ',') . ") VALUES (:'" . implode(array_keys($values), "',:'") ."')";
//var_dump($sql);


$sql = "UPDATE `{$table}` SET ";
foreach ($values as $key => $value) {
    $sql .= $key . '=' . ":{$key},";
}
$sql = rtrim($sql, ',');


echo $sql;
