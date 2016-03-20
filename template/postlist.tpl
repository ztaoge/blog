<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>文章管理</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../blog/asset/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../blog/asset/css/layout.css">
    <link rel="stylesheet" href="../blog/asset/css/post_edit.css">
    <link rel="stylesheet" type="text/css" href="../blog/asset/css/postlist.css"
    <script charset="utf-8" src="../blog/asset/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="../blog/asset/kindeditor/lang/zh_CN.js"></script>

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
        <div class="blog_title"><a href="###"><{$username}>'s blog</a></div>
    </div>
    <div class="navbar">
        <p>文章管理</p>
    </div>
    <div class="post_list">
        <div class="table_size">
            <table class="table table-striped">
                <thead>
                <th>标题</th>
                <th>时间</th>
                <th>预览</th>
                <th>操作</th>
                <tbody>
                <{section name=i loop=$list}>
                    <tr>
                        <td><a href="post.php?post_id=<{$list[i].id}>"><{$list[i].post_title}></a></td>
                        <td><{$list[i].create_time}></td>
                        <td><a href="post.php?post_id=<{$list[i].id}>">查看</a></td>
                        <td><a href="#">删除</a></td>
                    </tr>
                    <{/section}>
                </tbody>
            </table>
        </div>

        <div style="width:400px;float:right;"><{$tag}></div>
        <div class="clearfix"></div>
        <div class="page_info">
            <P>当前第<{$page}>页&nbsp;&nbsp;&nbsp;&nbsp;共有<{$total}>条数据</P>
        </div>

    </div>


</div>

</div>

</body>
</html>

