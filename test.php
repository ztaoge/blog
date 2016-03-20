<?php
require_once 'common/config/conf.php';
require_once 'vendor/mysql.php';
//require_once 'vendor/page.php';
require_once 'common/functions.php';

$dbh = mysql::getInstance();
$value = [
    'id' =>getUuid(),
    'username' => '1zzz',
    'passwd' => '1zzz',
    //'user_url' => '',
    'email' => '1231@qq.com',
    //'create_time' => '',
    //'user_group' => 'normal',
    //'avatar' => '',
    //'friend_id' => '',
];
//$dbh->insert('blog_users', $value);
//var_dump($dbh->select('blog_users'));

//$dbh->insert('c',['id'=>11]);


$list = $dbh->select('blog_users', [], [0,1], 'id', 'desc');

//print_r($list);
//var_dump($value);
$data = [];
//$data['id'] = 11;
//$data['author_id'] = 11;
//$data['post_content'] = 'asdfa';
//if ($dbh->insert('blog_posts', $data)) {
//    echo 'it work';
//} else {
//    echo 'failure';
//}
//$data['id'] = getUuid();
//$data['post_author_id'] = 11;
//$data['post_title'] = 'asdfasf';
//$data['post_content'] = '<p>wfasdf</p>';
//$dbh->insert('blog_posts', $data);
//var_dump($data);

header('charset=utf8');
$posts = $dbh->select('blog_posts', ['id' => $post_id = 145786642660151]);
var_dump($posts[0]);