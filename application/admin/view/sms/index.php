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
{block name="title"}短信验证码{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">短信验证码</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body" style="height: 500px;">
        <div class="col-md-offset-4" style="width: 400px;">
            <form method="post" id="upload" action="sms" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">您的access_key</label>
                    <input type="text" class="form-control" name="access_key" id="exampleInputEmail1" placeholder="请填写您阿里云的accessKey">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">您的access_secret</label>
                    <input type="text" class="form-control" name="access_secret" id="exampleInputEmail1" placeholder="请填写您阿里云的secretKey">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">您的模板名</label>
                    <input type="text" class="form-control" name="sign_name" id="exampleInputEmail1" placeholder="请填写您阿里云的模板名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">您的模板CODE</label>
                    <input type="text" class="form-control" name="tempplate_code" id="exampleInputEmail1" placeholder="请填写您阿里云的模板code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">发送电话</label>
                    <input type="text" class="form-control" name="mobile" id="exampleInputEmail1" placeholder="请填写您将要发送给谁">
                </div>
                 <button type="button" class="btn btn-success" id="sms" style="margin-left: 180px;">发送</button>

            </form>
            <br>
            <div style="font-size: 15px;"><span style="color: red;">注意:</span><span>这里是调用的阿里云的短信服务</span></div>
        </div>
    </div>

<div class="box-footer clearfix text-center">
</div>

{/block}

{block name="script"}
<script>

    $(function () {
        $("#sms").click(function () {
            $.post('sms',$('#upload').serialize(),function (data) {

                layer.msg(data.msg);
            });
        });
    });
</script>
{/block}