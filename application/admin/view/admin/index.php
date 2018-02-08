{extend name="public:common"}
{block name="link"}
{block name="content"}

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
                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="用户名">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">手机</label>
                    <input type="text" class="form-control" id="exampleInputPassword3" placeholder="手机">
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
                        <h4 class="modal-title" id="myModalLabel">添加商品</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        表单-->
                        <form action="add" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">商品名称</label>
                                <input type="text" class="form-control" name="goods_name" id="exampleInputEmail1" placeholder="请填商品名称">
                            </div>
                            <label for="exampleInputEmail1">商品分类</label>
                            <select class="form-control" name="category_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <div class="form-group">
                                <label for="exampleInputPassword1">价格</label>
                                <input type="text" name="shop_prcie" class="form-control" id="exampleInputPassword1" placeholder="请填写商品价格">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">商品状态</label><br/>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="inlineRadio2" value="1"> 激活
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="inlineRadio3" value="2"> 禁用
                                </label>
                            </div>
                            <label for="exampleInputPassword1">商品图片</label><br/>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#img">选择图片</button>
                            <div>
                                <label for="exampleInputPassword1">商品详细</label>
                                <script id="container" name="content" type="text/plain">
        输入商品详情
    </script>
                                <!-- 配置文件 -->
                                <script type="text/javascript" src="/ueditor/utf8-php/ueditor.config.js"></script>
                                <!-- 编辑器源码文件 -->
                                <script type="text/javascript" src="/ueditor/utf8-php/ueditor.all.js"></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('container');
                                </script>
                            </div>

                            <!--                        表单结束-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-default" id="tianjia">添加</button>
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
                        <h4 class="modal-title" id="myModalLabel">修改权限</h4>
                    </div>
                    <div class="modal-body">
                        <!--                        表单-->
                        <form action="edit" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">权限路径</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="请填权限路径   如 : admin/admin/index">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">权限名</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="请填写权限名">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">附加条件</label>
                                <input type="text" name="condition" class="form-control" id="condition" placeholder="请填写附加条件">
                                <input type="hidden" name="id" class="form-control" id="id"/>
                            </div>


                            <!--                        表单结束-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-default">修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        修改结束-->
        <br/>
    </div>

    <div class="box-body">
        <table  class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><p align="center">ID</p></th>
                <th><p align="center">用户名</p></th>
                <th><p align="center">用户头像</p></th>
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
                    <td  class="text-center" valign="top"><img src="<?=$model['img']?>" width="50px;"></td>
                    <td  class="text-center" valign="top"><?=$model['phone']?></td>
                    <td  class="text-center" valign="top"><?=$model['created_at']?></td>
                    <td  class="text-center" valign="top"><?=$model['login_at']?></td>
                    <td  class="text-center" valign="top"><?=$model['place']?></td>
                    <td  class="text-center" valign="top"><?=$model['login_ip']?></td>
                    <td  class="text-center" valign="top"><?=$model['status']?></td>
                    <td  class="text-center" valign="top"><a class="edit" id="<?=$model['id']?>"><span class="btn btn-success" data-toggle="modal" data-target="#edit">编辑</span><a/><a class="del"  href="#" url="del" url_id="<?=$model['id'] ?>" ><span class="btn btn-danger" >删除</span></a></td>
                </tr>
                </tbody>
            <?php endforeach;?>
        </table>

    </div>

    <div class="box-footer clearfix text-center">
    </div>

</div>
{/block}

{block name="script"} <script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>{/block}



