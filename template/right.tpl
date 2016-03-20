<div class="article_list">
    <p>博客正文</p>
    <div class="list">
        <hr/>
        <{section name=i loop=$list}>
        <hr/>
        <div class="item">
            <p style="float: left;"><a href="post.php?post_id=<{$list[i].id}>"><{$list[i].post_title}></a></p>
            <span style="float: right"><{$list[i].create_time}></span>
            <div class="clearfix"></div>
        </div>
        <{/section}>
    </div>
    <div class="pagebar">
        <{$tag}>
        <div class="clearfix"></div>
        <div style="padding-left:60%;">
            <P>当前第<{$page}>页&nbsp;&nbsp;&nbsp;&nbsp;共有<{$total}>条数据</P>
        </div>
    </div>
</div>