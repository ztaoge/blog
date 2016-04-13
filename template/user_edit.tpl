<!DOCTYPE html>
<html>
<head>
    <title>我的博客</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../blog/asset/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../blog/asset/css/layout.css">
    <script type="text/javascript" src="../blog/asset/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="../blog/asset/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../blog/asset/js/layout.js"></script>
    <script type="text/javascript" src="../blog/asset/js/pagination.js"></script>
</head>
<body>
<div class="topbar">
    <div class="topbar_main">
        <img src="" alt="logo">
        <{if $username ==  null}>
        <div class="topbar_login">
            <button class="signin" data-toggle="modal" data-target="#modal">登录</button>
            <a class="logout" href="template/signup.html" target="_blank">注册</a>
        </div>
        <{else}>
        <div class="topbar_login">
            你好,
            <a href="user.php" target="_blank"><{$username}></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a id="logout" href="#">退出</a>
        </div>
        <{/if}>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    欢迎登陆
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="username" placeholder="请输入名字">
                            <span></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="passwd" class="col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="passwd" placeholder="请输入密码">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button id="signin" type="button" class="btn btn-default">立即登录</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
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
        <form  class="form-horizontal" action="user.php">
            <div class="form-control">
                <label for="username" class="col-sm-2 control-label">用户名:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" value="<{$username}>" disabled>
                </div>
            </div>
            <div class="form-control">
                <label for="gender" class="col-sm-2 control-label">性别:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="gender" id="">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
            </div>
            <div class="form-control">
                <label for="email" class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" placeholder="请输入邮箱">
                </div>
            </div>
            <div class="form-control">
                <label for="avatar" class="sr-only col-sm-2 control-label" for="inputfile">上传头像</label>
                <div class="col-sm-5">
                    <input type="file" name="avatar">
                </div>
            </div>
            <div class="form-control">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>

        </form>
    </div>
</div>

</div>



<script type="text/javascript">
    $(document).ready(function(){
    });
</script>
</body>
</html>