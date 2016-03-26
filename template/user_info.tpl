<a href="#" class="btn btn-primary" style="display: inline-block;float: right;margin-top:3px;margin-right:4px;">编辑</a>
<p>用户信息</p>

<div class="right">
    <div>

        <img class="avatar" alt="用户头像" src="#"/>
        
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>用户姓名:</td>
                <td><{$users[0]['username']}></td>
            </tr>
            <tr>
                <td>用户性别:</td>
                <td><{$users[0]['gender']}></td>
            </tr>
            <tr>
                <td>用户邮箱:</td>
                <td>
                    <{if $users[0]['email'] neq null}>
                        <{$users[0]['email']}>
                    <{else}>
                        <label style="color:red;">未填写</label>
                    <{/if}>
                </td>
            </tr>
            <tr>
                <td>用户注册时间:</td>
                <td><{$users[0]['create_time']}></td>
            </tr>
            <tr><td colspan="2">共发表了文章: &nbsp;&nbsp;&nbsp;<a href="postlist.php"><{count($posts)}></a>&nbsp;篇</td></tr>
            <tr><td colspan="2">共发表评论: &nbsp;&nbsp;&nbsp;<a href="#"><{count($comments)}></a>&nbsp;条</td></tr>
            <tr><td colspan="2">当前好友数: &nbsp;&nbsp;&nbsp;<a href="#"><{count($friends)}></a>&nbsp; 个</td></tr>
            </tbody>
        </table>
    </div>
    <div class="posts">

    </div>
</div>