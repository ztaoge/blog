<?php
require_once 'vendor/mysql.php';
require_once 'common/config/conf.php';
require_once 'common/functions.php';

isset($_POST['username']) ? $username = $_POST['username'] : $username = null;
isset($_POST['passwd']) ? $passwd= $_POST['passwd'] : $passwd = null;



//检查用户名
function check_username() {
    $dbh = mysql::getInstance();
    $username = $dbh->select('user', ['username' => $_GET['username']]);
    if ($username) {
        //该用户已存在
        echo 201;
    } else {
        //该用户不存在
        echo 404;
    }
}
if (isset($_GET['username']) ? $_GET['username'] : false) {
    check_username();
}

//用户注册
//TODO: 注册后的操作
if($username != null && $passwd != null) {
    $dbh = mysql::getInstance();
    if($dbh->insert('user', ['id' => getUuid(), 'username' => $username, 'passwd' => $passwd])) {
        setcookie('username', $username, COOKIE_EXPIRE);
        header("location:http://localhost:8080/blog/index.php");
    } else {
        echo 'it false';
    }
}

