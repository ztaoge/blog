<?php
require 'vendor/mysql.php';
require 'common/config/conf.php';

isset($_POST['username']) ? $username = $_POST['username'] : $username = null;
isset($_POST['passwd']) ? $passwd = $_POST['passwd'] : $passwwd = null;
if ($username && $passwd) {
    $dbh = mysql::getInstance();
    if ($result = $dbh->select('blog_users',['username' => $username, 'passwd' => $passwd])) {
        setcookie('username', $username, COOKIE_EXPIRE);  // 10s
        echo 'success';
    } else {
        echo 'fail';
    }
}