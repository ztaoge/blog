<?php
require_once 'asset/smarty-3.1.28/libs/Smarty.class.php';
require_once 'common/config/conf.php';
require_once 'common/functions.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';
require_once 'common/smarty.inc.php';

$dbh = mysql::getInstance();
//判断用户是否登录
isset($_COOKIE['username']) ? $username = $_COOKIE['username'] : $username = null;

isset($_GET['post_id']) ? $post_id = $_GET['post_id'] : $post_id = null;
isset($_GET['action']) ? $action = $_GET['action'] : $action = null;

//博文页
if ($post_id && $action == null) {
    $posts = $dbh->select('blog_posts', ['id' => $post_id]);
    $users = $dbh->select('blog_users', ['id' => @$posts[0]['post_author_id']]);
    $comments = $dbh->select('blog_comments', ['comment_post_id' => $post_id], [], 'create_time', 'desc');

    $smarty->assign('id', $post_id);
    /*$smarty->assign('author', @$users[0]['username']);*/
    $smarty->assign('title', @$posts[0]['post_title']);
    $smarty->assign('content', @$posts[0]['post_content']);
    $smarty->assign('username', $username);
    $smarty->assign('comment', $comments);
    $smarty->display('post.tpl');
}

//博文编辑页
if ($action) {
    $users = $dbh->select('blog_users', ['username' => $username], [0,1]);
    $smarty->assign('author_id', $users[0]['id']);
    $smarty->assign('username', $username);
    $smarty->display('post_edit.tpl');
}

//提交博文
if ($_POST) {
    $users = $dbh->select('blog_users', ['username' => $_POST['author']]);
    $data = [];
    $data['id'] = getUuid();
    $data['post_title'] = $_POST['post_title'];
    $data['post_author_id'] = intval($users['0']['id']);
    $data['post_content'] = $_POST['post_content'];
    /*var_dump($data);*/
    if ($dbh->insert('blog_posts', $data)) {
        $smarty->assign('title', $data['post_title']);
        $smarty->assign('username', $_POST['author']);
        $smarty->assign('content', $data['post_content']);
        $smarty->display('post.tpl');
        //header('Location:' . $_SERVER['PHP_SELF']);
    } else {
        echo '操作未成功';
    }
}