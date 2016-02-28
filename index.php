<?php
require 'asset/smarty-3.1.28/libs/Smarty.class.php';
require 'common/config/conf.php';
require 'vendor/mysql.php';

$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';

isset($_COOKIE['username']) ? $username = $_COOKIE['username'] : $username = null;

$smarty->assign('username', $username);
$smarty->display('layout.html');
$smarty->display('signup.html');


