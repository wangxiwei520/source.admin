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
