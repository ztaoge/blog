<?php
require_once 'asset/smarty-3.1.28/libs/Smarty.class.php';
require_once 'common/config/conf.php';
require_once 'vendor/mysql.php';
require_once 'vendor/page.php';
require_once 'common/smarty.inc.php';


isset($_COOKIE['username']) ? $username = $_COOKIE['username'] : $username = null;
//每页默认数据量
$num = 5;

$page = new page('blog_posts', [], $num, 'create_time');
isset($_GET['page']) ? $p = $_GET['page'] : $p = 1;
$list = $page->getPage($p);

$smarty->assign('username', $username);
$smarty->assign('url', $_SERVER['PHP_SELF']);
$smarty->assign('page', $p);
$smarty->assign('tag', $page->getTag($p));//$page->getData());
$smarty->assign('list', $list);
$smarty->assign('total', $total = $page->tt());
$smarty->display('layout.html');

//print_r($list);
//$smarty->display('test.tpl');
