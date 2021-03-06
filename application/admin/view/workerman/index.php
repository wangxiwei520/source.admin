{extend name="public:common"}

{block name="style"}
<link rel="stylesheet" type="text/css" href="/static/chatroom/css/chat.css" />
{/block}
{block name="title"}聊天室{/block}
{block name="route"}<li><a href="#"><i class="fa fa-dashboard"></i>工具</a></li>
<li class="active">聊天室</li>{/block}
{block name="content"}
<div class="box-header">


</div>

<div class="box-body">
    <div class="box-footer clearfix text-center">
        <div class="content" style="margin-top: -170px;">
            <div class="chatBox">
                <div class="chatLeft" >
                    <div class="chat01">
                        <div class="chat01_title">
                            <ul class="talkTo">
                                <li><a href="javascript:;">简易聊天工具</a></li></ul>

                        </div>
                        <div class="chat01_content" id="content">
                        </div>
                    </div>
                    <div class="chat02">
                        <div class="chat02_title"><a class="chat02_title_btn ctb02"
                                                                                         href="javascript:;" title="选择文件">
                                <embed width="15" height="16" flashvars="swfid=2556975203&amp;maxSumSize=50&amp;maxFileSize=50&amp;maxFileNum=1&amp;multiSelect=0&amp;uploadAPI=http%3A%2F%2Fupload.api.weibo.com%2F2%2Fmss%2Fupload.json%3Fsource%3D209678993%26tuid%3D1887188824&amp;initFun=STK.webim.ui.chatWindow.msgToolBar.upload.initFun&amp;sucFun=STK.webim.ui.chatWindow.msgToolBar.upload.sucFun&amp;errFun=STK.webim.ui.chatWindow.msgToolBar.upload.errFun&amp;beginFun=STK.webim.ui.chatWindow.msgToolBar.upload.beginFun&amp;showTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.showTipFun&amp;hiddenTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.hiddenTipFun&amp;areaInfo=0-16|12-16&amp;fExt=*.jpg;*.gif;*.jpeg;*.png|*&amp;fExtDec=选择图片|选择文件"
                                       data="upload.swf" wmode="transparent" bgcolor="" allowscriptaccess="always" allowfullscreen="true"
                                       scale="noScale" menu="false" type="application/x-shockwave-flash" src="http://service.weibo.com/staticjs/tools/upload.swf?v=36c9997f1313d1c4"
                                       id="swf_3140">
                            </a>
                        </div>
                        <div class="chat02_content">
                            <textarea id="textarea"></textarea>
                        </div>
                        <div class="chat02_bar">
                            <ul>
                                <li style="left: 20px; top: 10px; padding-left: 30px;">Source.admin  简易聊天工具  回车键发送消息</li>
                                <li style="right: 5px; top: 5px;"><a href="javascript:;" id="send">
                                        <img src="/static/chatroom/img/send_btn.jpg" id="send"></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="clear: both;">
                </div>
            </div>
        </div>
    </div>
    </div>




{/block}
{block name="link"}
<script type="text/javascript" src="js/chat.js"></script>
<script type="text/javascript" src="/static/layer/jquery.cookie.js"></script>
{/block}
{block name="script"}
<script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
<script>

    if($.cookie('name')==null){
        setname();
    }
    // 连接服务端
    var socket = io('http://127.0.0.1:3120');
    // 触发服务端的chat message事件
//    socket.emit('chat message', 'aaaa');
    var arr=new Array();
    arr[0]= $.cookie('name');
    arr[1]="Holle";
    //判定是否设置姓名
    if($.cookie('name')!=null){
        socket.emit('event name', arr);
    }
    //添加发送事件
    $('#send').click(function () {
        addmessage();
    });
    $('#textarea').keydown(function (e) {

        if($.cookie('name')!=null){
            //回车才能触发
            if(e.which == 13) {
                addmessage();
            }
        }else{
            //没有设置姓名重新弹出输入框
            setname();
        }

    });


    // 服务端通过emit('chat message from server', $msg)触发客户端的chat message from server事件
    socket.on('chat message from server', function(msg){
        console.log(msg);
    });
    socket.on('event name', function(msg){
         $('#content').append('<br><span>'+msg[0]+'说:'+'<span/><br><span>'+msg[1]+'<span/>');
        console.log(msg[0],msg[1]);
    });

    //发送消息并添加
    function addmessage() {
        var content = $('#textarea').val();
        //消息不能为空
//        console.debug(content);return;
        if(content==""){
            layer.msg('消息不能为空');
        }else{
            socket.emit('chat message', 'aaaa');
            var arr=new Array();
            arr[0]=$.cookie('name');
            arr[1]=content;
            socket.emit('event name', arr);
            $('#textarea').val("");
            $('#content').append('  <span style="margin-left: 520px;" class="uid">我说:</span><br><span style="margin-left: 450px;" class="ucontent">'+arr[1]+'</span>')
        }

    }

    //设置姓名
    function setname() {
        layer.prompt({title: '输入您的姓名', formType: 2}, function(text, index){
            $.cookie('name',text);
            layer.close(index);
//        console.debug(pass);return;
            layer.msg(text+'欢迎来到简易聊天室');
        });
    }
</script>
{/block}
