<?php
require_once 'asset/smarty-3.1.28/libs/Smarty.class.php';
require_once 'common/config/conf.php';
require_once 'common/functions.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';
require_once 'common/smarty.inc.php';

$dbh = mysql::getInstance();
if($_POST) {
    $data['id'] = getUuid();
    $data['comment_post_id'] = intval($_POST['comment_post_id']);
    $data['comment_author']  = $_POST['comment_author'];
    $data['comment_content'] = $_POST['comment_content'];
    $dbh->insert('blog_comments', $data);
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/blog/post.php?post_id=' . $data['comment_post_id']);

    //var_dump($data);

}




