<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="scclui框架">
    <meta name="description" content="scclui为轻量级的网站后台管理系统模版。">
    <title>首页</title>

    <link rel="stylesheet"  href="{{$static('/layui/css/layui.css')}}">
    <link rel="stylesheet" href="{{$static('/css/sccl.css')}}">

</head>

<body class="login-bg">
<div class="login-box">
    <header>
        <h1>后台管理系统</h1>
    </header>
    <div class="login-main">
        <div class="layui-form" method="post">
            @csrf
            <input name="__RequestVerificationToken" type="hidden" value="">
            <div class="layui-form-item">
                <label class="login-icon">
                    <i class="layui-icon"></i>
                </label>
                <input id="userName" type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="login-icon">
                    <i class="layui-icon"></i>
                </label>
                <input id="password" type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="pull-left login-remember">
                    <label>记住帐号？</label>

                    <input type="checkbox" name="rememberMe" value="true" lay-skin="switch" title="记住帐号"><div class="layui-unselect layui-form-switch"><i></i></div>
                </div>
                <div class="pull-right" id="login">
                    <button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="login">
                        <i class="layui-icon"></i> 登录
                    </button>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <footer>
        <p>laitingyou @ outlook.out </p>
    </footer>
</div>
<script type="text/html" id="code-temp">
    <div class="login-code-box">
        <input type="text" class="layui-input" id="code" />
        <img id="valiCode" src="/manage/validatecode?v=636150612041789540" alt="验证码" />
    </div>
</script>
<script src="{{$static('/layui/layui.js')}}"></script>
<script src="{{$static('/js/axios.min.js')}}"></script>
<script src="{{$static('/js/md5.min.js')}}"></script>
<script>
    layui.use(['layer','form'], function(){
        var layer = layui.layer;

        document.getElementById('login').onclick=function (ev) {
            var userName=document.getElementById('userName').value,
                password=document.getElementById('password').value;
            if(userName && password){
                axios.post('/api/admin/login', {
                    userName: userName,
                    password: md5(password)
                })
                    .then(function (response) {
                        window.location.href='/admin?uid='+response.data.uid;
                    })
                    .catch(function (error) {
                        layer.alert(error);
                    });
            }else {
                layer.alert('账户名或密码不能为空');
            }
        }
    });


</script>
</body>
</html>
