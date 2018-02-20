{extend name="public:common"}

{block name="title"}富文本框{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">富文本框</li>{/block}
{block name="content"}
<form action="add" method="post" enctype="multipart/form-data">
    <script id="container" name="content" type="text/plain">
    </script>
    <input type="file" name="file">
    <button type="submit" class="btn btn-success">提交</button>
</form>




{/block}
{block name="link"}
<!-- 配置文件 -->
<script type="text/javascript" src="/static/ueditor/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/ueditor/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
{/block}
{block name="script"}
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        initialFrameHeight: 600,

    });

</script>

{/block}
