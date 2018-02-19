{extend name="public:common"}
{block name="link"}
{/block}

{block name="title"}用户管理{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>用户管理</a></li>
<li class="active">用户列表</li>{/block}
{block name="content"}
<div id="source">
    <div class="box-header">

        <div class="col-xs-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                <span class="glyphicon glyphicon-download-alt"></span>
            </button>
        </div>

        <div class="col-md-offset-7">
            <form class="form-inline " >
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">用户名</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail3" placeholder="用户名">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">手机</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputPassword3" placeholder="手机">
                </div>


                
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>

        <!--        添加-->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">添加用户</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        表单-->
                        <form action="#" method="post" id="sth">
                            <div class="form-group">
                                <label for="exampleInputEmail1">用户名</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="请填用户名">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密码</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="请填写用户密码">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">电话</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="请填写电话">
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary add" url="add"  >添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--添加结束-->


        <!--        修改-->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">修改用户</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        表单-->
                        <form action="#" method="post" id="alter">
                            <div class="form-group">
                                <label for="exampleInputEmail1">用户名</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="请填用户名">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">电话</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="请填写电话">
                                <input type="hidden" name="id" class="form-control" id="id" placeholder="请填写电话">
                            </div>
                            <label for="exampleInputPassword1">会员状态</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="inlineRadio1" value="1"> 激活
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="inlineRadio2" value="0"> 禁用
                            </label>

                            <!--                        表单结束-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary mind" url="edit">修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        修改结束-->
        <br/>
    </div>
<div id="list">
    <div class="box-body">
        <table  class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><p align="center">ID</p></th>
                <th><p align="center">用户名</p></th>
                <th><p align="center">电话</p></th>
                <th><p align="center">创建时间</p></th>
                <th><p align="center">登录时间</p></th>
                <th><p align="center">登录地点</p></th>
                <th><p align="center">登录IP</p></th>
                <th><p align="center">状态</p></th>
                <!--                <th>上级</th>-->
                <th><p align="center">操作</p></th>
            </tr>
            </thead>
            <?php foreach ($models as $model):?>
                <tbody>
                <tr class="odd">
                    <td  class="text-center" valign="top"><?=$model['id']?></td>
                    <td  class="text-center" valign="top"><?=$model['username']?></td>
                    <td  class="text-center" valign="top"><?=$model['phone']?></td>
                    <td  class="text-center" valign="top"><?=date('Y-m-d H:i:s',$model['created_at'])?></td>
                    <td  class="text-center" valign="top"><?=date('Y-m-d H:i:s',$model['login_at'])?></td>
                    <td  class="text-center" valign="top">
                        <?=$model['place']?$model['place']:'从未登录';?></td>
                    <td  class="text-center" valign="top"><?=$model['login_ip']?></td>
                    <td  class="text-center" valign="top"><span class="<?=$model['status']?'glyphicon glyphicon-ok':'glyphicon glyphicon-remove';?>" style="color: <?=$model['status']?'green':'red';?>"></span></td>
                    <td  class="text-center" valign="top">
                        <a class="activate" status_id="<?=$model['status'] ?>" activate_id="<?=$model['id'] ?>"><span class="btn btn-<?=$model['status']?'danger':'success';?>"><?=$model['status']?'禁用':'启用';?></span><a/>

                            <a class="edit" ><span class="btn btn-primary glyphicon glyphicon-cog edit" data-toggle="modal" data-target="#edit" id="<?=$model['id'] ?>"></span><a/>

                                <a class="del"  href="#" url="del" url_id="<?=$model['id'] ?>" ><span class="btn btn-danger glyphicon glyphicon-trash" ></span></a>
                    </td>
                </tr>
                </tbody>
            <?php endforeach;?>
        </table>

    </div>
    <div align="center"><?=$page?></div>
</div>
</div>
    <div class="box-footer clearfix text-center">
    </div>

</div>
<form class="activate" id="activate">
    <input type="hidden" name="activate_id" id="activate_id">
    <input type="hidden" name="status_id" id="status_id">
</form>
{/block}

{block name="script"}
<script>
    $('#source').on('click','.activate',function () {
        $("#activate_id").val($(this).attr('activate_id'));
        $("#status_id").val($(this).attr('status_id'));
        $.post('activate',$("#activate").serialize(),function (data) {
            if(data.code){
                layer.msg(data.msg);
                /*三秒后跳转到相应路径 此处路径为后台跳转路径*/
                if(data.url!=null){
                    setTimeout(function () {
                        location.href=data.url;
                    }, 1500);
                }
            }else {
                //错误打印错误信息
                layer.msg(data.msg);

            }
        });
    });



       $("#list").on("click",'.pagination  li a',function () {
            var url = $(this).attr('href');
            $('.pagination li a').attr("href",'javascript:void(0);');
           $.get(url,function(html){
               //返回数据输出到id为list的元素中
               $('#list').html(html);
           });
        });

</script>
{/block}





