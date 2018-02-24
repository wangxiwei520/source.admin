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
{block name="title"}文件下载{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">文件下载</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body" style="height: 400px;">
        <div class="col-md-offset-4" style="margin-top: 100px; ">
            <form class="form-inline " method="post" id="qrcode" action="download" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">文件地址</label>
                    <input type="text" class="form-control" name="filename" id="exampleInputEmail3" placeholder="本地文件名">

                </div>
                <button type="submit" id="code" class="btn btn-primary"><span>下载本地文件</span></button>
            </form>
            <br>

        </div>
        <div class="col-md-offset-4" style="margin-top: 20px; ">
            <form class="form-inline " method="post" id="qrcode" action="downloadFile" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">文件地址</label>
                    <input type="text" class="form-control" name="url" id="exampleInputEmail3" placeholder="远程文件路径">

                </div>
                <button type="submit" id="code" class="btn btn-primary"><span>下载远程文件</span></button>
            </form>
            <br>
            <div style="font-size: 15px;"><span style="color: red;">注意:</span><span>带上文件路径 以及后缀名</span></div>
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