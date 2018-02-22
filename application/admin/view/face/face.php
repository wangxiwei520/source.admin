{extend name="public:common"}
{block name="title"}人脸识别{/block}
{block name="style"}
<link rel="stylesheet" type="text/css" href="/static/face/style.css" />
{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">人脸识别</li>{/block}
{block name="content"}
<div class="box-header">

</div>

    <div class="box-body">
        <div class="money_box">
            <div class="wp">
                <!--简介联系方式-->
                <div class="synopsis">
                    <div class="design">
                       <h4 align="center">识别信息</h4>
                        <br>
                        人脸数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$img['result_num']?>张
                        <br>
                        年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$img['result'][0]['age']?>岁
                        <br>
                        容貌评分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=round($img['result'][0]['beauty'],1)?>分
                        <br>
                        表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;情&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($img['result'][0]['expression']=='0'){ echo '没笑';}elseif($img['result'][0]['expression']=='1'){echo '微笑';}else{echo '大笑';}?>
                        <br>
                        准确率&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=round($img['result'][0]['expression_probablity'],5)*100?>%
                        <br>
                        性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($img['result'][0]['gender']=='male'){ echo '男';}else{echo '女';}?>
                        <br>
                        肤&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$img['result'][0]['race']?>
                        <br>
                    </div>
                    <div class="me">
                        <div class="about_me">
                            <dl>
                                <dd class="me_top"><a target="_blank" title="" href="#"></a></dd>
                                <dd class="contact"><strong>您的图片</strong><img src="<?='/'.$imgpath?>" style="width: 200px;"><br>
                                    <br>
                                    </dd>
                                <dd class="weixin"><a target="_blank" title="添加微信，来聊天" href="#"></a></dd>
                                <dd class="lianxi"><a target="_blank" title="联系" href="#"></a></dd>
                            </dl>
                        </div>
                        <div class="qianxiansen_card"><a target="_blank" title="dan2dan" href="#"></a></div>
                    </div>
                </div>
                <!--分享-->
                <div class="links">


                </div>

                <!--底部-->
                <div class="copyright_index">
                    <div class="qian_icon"><a target="_blank" title="关于dan2dan" href="http://www.dan2dan.net/about"></a></div>
                </div>
            </div>
        </div>
    </div>

<div class="box-footer clearfix text-center">
</div>

{/block}

{block name="script"}
{/block}