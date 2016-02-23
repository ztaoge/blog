<?php
require_once 'common/config/conf.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';
$db = new PDO(DSN, USER, PASSWD);
$values = [
    'name'   => 'girl',
    'gender' => 'female',
];
$table = 'test';



$page = new page();
var_dump($page->test());








