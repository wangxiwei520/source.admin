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
{block name="title"}人脸识别{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">人脸识别</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body" style="height: 500px;">
        <div class="col-md-offset-4" style="width: 400px;">
            <form method="post" id="face" action="face" enctype="multipart/form-data">
                <div class="form-group form-inline" >
                    <label for="exampleInputEmail1">上传图片</label>
                    <div><span class="fileinput-button btn btn-success"><span>选择图片</span><input type="file" name="file" multiple></span></div>
                </div>
                 <button type="submit" class="btn btn-success" id="qiniu" style="margin-left: 180px;">上传</button>
            </form>
            <br>
            <div style="font-size: 15px;"><span style="color: red;">注意:</span><span>测试请输入你七牛对应的信息。</span></div>
        </div>
    </div>

<div class="box-footer clearfix text-center">
</div>

{/block}

{block name="script"}
{/block}