{extend name="public:common"}

{block name="style"}<style>
    .fileinput-button {
        position: relative;
        display: inline-block;
    }

    .fileinput-button input{
        position: absolute;
        right: 0px;
        top: 0px;
    }
    .fileinput-button {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }
    .fileinput-button {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }

    .fileinput-button input{
        position: absolute;
        left: 0px;
        top: 0px;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
    }
    .fileinput-button input{
        position:absolute;
        right: 0px;
        top:0px;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
    }
</style> {/block}
{block name="title"}七牛上传{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">七牛上传</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body" style="height: 500px;">
        <div class="col-md-offset-4" style="width: 400px;">
            <form method="post" id="upload" action="upload" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">您的accessKey</label>
                    <input type="text" class="form-control" name="accessKey" id="exampleInputEmail1" placeholder="请填写您七牛的accessKey">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">您的secretKey</label>
                    <input type="text" class="form-control" name="secretKey" id="exampleInputEmail1" placeholder="请填写您七牛的secretKey">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">您的七牛空间名称</label>
                    <input type="text" class="form-control" name="bucket" id="exampleInputEmail1" placeholder="请填写您七牛的空间名称">
                </div>
                <div class="form-group form-inline" >
                    <label for="exampleInputEmail1">上传图片</label>
                    <div><span class="fileinput-button btn btn-success"><span>选择图片</span><input type="file" name="file" multiple></span></div>
                </div>
                 <button type="button" class="btn btn-success" id="qiniu" style="margin-left: 180px;">上传</button>

            </form>
            <br>
            <div style="font-size: 15px;"><span style="color: red;">注意:</span><span>测试请输入你七牛对应的信息。</span></div>
        </div>
    </div>

<div class="box-footer clearfix text-center">
</div>

{/block}

{block name="script"}
<script>
    $(function () {
        $("#qiniu").click(function () {
            $("#upload").ajaxSubmit({
                success: function (data) {
                    layer.msg(data.msg);
                },
                error: function (error) {layer.msg('上传失败'); },
                url: 'upload', /*设置post提交到的页面*/
                type: "post", /*设置表单以post方法提交*/
                dataType: "json" /*设置返回值类型为文本*/
            });
        });
    });
</script>
{/block}