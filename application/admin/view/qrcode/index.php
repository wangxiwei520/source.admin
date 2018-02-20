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
{block name="title"}二维码生成{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">二维码生成</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body" style="height: 400px;">
        <div class="col-md-offset-4" style="margin-top: 100px; ">
            <form class="form-inline " method="post" id="qrcode" action="setcode" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">二维码内容</label>
                    <input type="text" class="form-control" name="code" id="exampleInputEmail3" placeholder="请输入相要生成的内容">

                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">logo</label>
                    <div><span class="fileinput-button btn btn-success"><span>选择图片</span><input type="file" name="file" ></span></div>

                </div>

                <button type="submit" id="code" class="btn btn-primary"><span>生成</span></button>
            </form>
            <br>
            <div style="font-size: 15px;"><span style="color: red;">注意:</span><span>选择图片则生成带logo的二维码，不选择则无logo。</span></div>
            <?php $code = new \app\admin\controller\QrcodeController();
            ?>
        </div>

    </div>

<div class="box-footer clearfix text-center">
</div>

{/block}

{block name="script"}
<script>
    $('#code').click(function () {

    });

</script>
{/block}