<head>
    <meta charset="utf-8">
</head>
<?php
require_once 'vendor/mysql.php';
require_once 'common/config/conf.php';


$dbh = mysql::getInstance();
//var_dump($dbh->select('test'));
//var_dump($dbh->test());

function arr_implode($array = [], $glue = '') {
    $str = '';
    foreach ($array as $key => $value) {
        $str .= "`{$key}`" . $glue . ":{$key}" . ' AND ';
    }

    return rtrim($str, ' AND');
}

$condition = ['name' => 'zzz', 'gender' => 'male', 'name1' => 'zz', 'gender1' => 'male'];
//$table = 'test';
//$sql = "SELECT * FROM `{$table}`";
//echo $sql .= ' WHERE ' . implode($condition, ' AND ');

//echo arr_implode($condition, '=');

//var_dump($dbh->select('test', ['gender' => 'male'], [2]));

//var_dump($dbh->insert('test', ['name'=>'ztaoge','gender'=>'female']));

var_dump($dbh->update('test', ['name' => 'test'], ['id' => 1002]));



