<?php
require_once 'asset/smarty-3.1.28/libs/Smarty.class.php';
require_once 'common/config/conf.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';

$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';

isset($_COOKIE['username']) ? $username = $_COOKIE['username'] : $username = null;
//每页默认数据量
$num = 5;

$page = new page('blog_users', $num, 'create_time');
isset($_GET['page']) ? $p = $_GET['page'] : $p = 1;
$list = $page->getPage($p);

$smarty->assign('url', $_SERVER['PHP_SELF']);
$smarty->assign('page', $p);
$smarty->assign('pages', $i = 5);//$page->getData());
$smarty->assign('list', $list);
$smarty->assign('username', $username);
$smarty->display('layout.html');

//print_r($list);
//$smarty->display('test.tpl');

echo 'http://'.$_SERVER['HTTP_HOST'];//.$_SERVER['REQUEST_URI'];
echo $_SERVER['PHP_SELF'];
