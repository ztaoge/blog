<?php
require_once 'asset/smarty-3.1.28/libs/Smarty.class.php';
require_once 'common/config/conf.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';
require_once 'common/smarty.inc.php';

isset($_COOKIE['username']) ? $username = $_COOKIE['username'] : $username = null;

if (is_null($username)) {
    $smarty->display('error.html');
} else if (isset($_GET['edit'])) {
    $smarty->assign('username', $username);
    $smarty->display('user_edit.tpl');
}else {
    $users = mysql::getInstance()->select('blog_users', ['username' => $username]);
    $comments = mysql::getInstance()->select('blog_comments', ['comment_author' => $username]);
    $posts = mysql::getInstance()->select('blog_posts', ['post_author_id' => intval($users[0]['id'])]);
    $friends = mysql::getInstance()->select('blog_friends', ['user_id' => intval($users[0]['id'])]);
    $smarty->assign('posts', $posts);
    $smarty->assign('friends', $friends);
    $smarty->assign('comments', $comments);
    $smarty->assign('users', $users);
    $smarty->assign('username', $username);
    $smarty->display('user.tpl');
}


