<?php

//配置数据库
define('DSN', 'mysql:host=127.0.0.1;dbname=blog');
define('USER', 'root');
define('PASSWD', 'root');

//设置cookie过期时间
define('EXPIRE_TIME', 60*60);//单位秒
define('COOKIE_EXPIRE', $_SERVER['REQUEST_TIME']+EXPIRE_TIME);
