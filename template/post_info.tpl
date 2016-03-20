<p>博客正文</p>
<div class="post">
    <div class="post_title"><h3><{$title}></h3></div>
    <hr/>
    <div class="post_content">
        <{$content}>
    </div>
</div>
<hr/>
<div class="comment">
    <p>查看评论</p>
    <{section name=i loop=$comment}>
    <div class="comment_item">
        <p style="float: left">用户:<{$comment[i].comment_author}></p>
        <p style="float: right">于<{$comment[i].create_time}>发表</p>
        <div class="clearfix"></div>
        <div class="comment_content"><{$comment[i].comment_content}></div>

    </div>
    <{/section}>
<div class="post_comment">
    <{if $username != null}>
    <form action="comment.php" method="post">
        <input name="comment_post_id" value="<{$id}>" style="display: none;"/>
        <input name="comment_author" value="<{$username}>" style="display:none"/>
        <textarea name="comment_content" rows="40" style="width:70%;height:100px;"></textarea>
        <button class="btn btn-default" type="submit">提交</button>
    </form>
    <{else}>
    <div><p style="font-size: 20px;">请登录后再来评论</p></div>
    <{/if}>
</div>