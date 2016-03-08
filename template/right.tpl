<div class="article_list">
    <p>博客正文</p>
    <div class="list">
        <hr/>
        <{section name=i loop=$list}>
        <hr/>
        <div class="item"><p><{$list[i].create_time}></p></div>
        <{/section}>
    </div>
    <div class="pagebar">
        <{if $pages < 5}>
        <ul class="pagination pagination-lg">
            <{for $i=0;$i<$pages;$i++}>
                <li><a href="#"><{$i+1}></a></li>
            <{/for}>
        </ul>
        <{else}>
            <ul class="pager">
                <li><a href="#">上一页</a></li>
            </ul>
        <ul class="pagination pagination-lg">
            <{for $i=0;$i<5;$i++}>
                <li><a href="javascript:;"><{$i+1}></a></li>
            <{/for}>
        </ul>
            <ul class="pager">
                <li><a href="#">下一页</a></li>
            </ul>
        <{/if}>

        <ul class="pagination pagination-lg">

        </ul>


        <div class="clearfix"></div>
        <div style="padding-left:60%;">
            <P>当前第**页&nbsp;&nbsp;&nbsp;&nbsp;共有**条数据</P>
        </div>
    </div>
</div>