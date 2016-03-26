<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><{$username}>的个人信息</title>
    <link rel="stylesheet" type="text/css" href="../blog/asset/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../blog/asset/css/layout.css">
    <link rel="stylesheet" href="../blog/asset/css/user.css">
    <script type="text/javascript" src="../blog/asset/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="../blog/asset/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../blog/asset/js/layout.js"></script>
    <script type="text/javascript" src="../blog/asset/js/pagination.js"></script>
</head>
<body>
<div class="topbar">
    <div class="topbar_main">
        <img src="" alt="logo">
        <{if $username !=  null}>
        <div class="topbar_login">
            你好,
            <a href="user.php" target="_blank"><{$username}></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a id="logout" href="#">退出</a>
        </div>
        <{/if}>

    </div>
</div>
<div class="blog">
    <div class="headarea">
        <div class="blog_title"><a href="###">someone's blog</a></div>
    </div>

    <div class="left_column">
    <{include file="left.tpl"}>
    </div>
    <div class="right_column">
        <{include file="user_info.tpl"}>
    </div>

</div>
</body>
</html>