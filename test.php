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

$sql = "INSERT INTO `{$table}` (";
$sql .= implode(array_keys($values), ',') . ") VALUES (:" . implode(array_keys($values), ",:") .")";
echo $sql . '<br/>';
try {
    $stmt = $db->prepare($sql);
    foreach ($values as $key => $value) {
        $stmt->bindParam($key, $value);
        echo 'KEY:'.$key." value:".$value;
    }
    $stmt->execute();
    echo 'ok';
} catch (PDOException $e) {
    printf($e->getMessage());
}




