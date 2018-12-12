<!DOCTYPE html>

<html lang="cn">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>登录 | {{env('APP_NAME', 'Laravel')}}</title>
    <!-- Icons-->
    <link href="{{asset('photostyle/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('photostyle/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//at.alicdn.com/t/font_957641_4flft88vhdk.css">
    <link href="{{asset('logins/css/style.css')}}" rel='stylesheet' type='text/css' />
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <!--SIGN UP-->
        <div class="login-form">
            <div class="close"> </div>
                <div class="head-info">
                    <label class="lbl-1"> </label>
                    <label class="lbl-2"> </label>
                    <label class="lbl-3"> </label>
                </div>
                    <div class="clear"> </div>
            <div class="avtar">
                <img src="{{asset('logins/images/avtar.png')}}" />
            </div>
            {{--  错误信息  --}}
            @if ($errors->has('name'))
                <div class="message"><strong>{{ $errors->first('name') }}</strong></div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-input text">
                    <span><i class="iconfont icon-user3"></i></span>
                    <input type="text" class="text" name="name" value="{{ old('name') }}"  placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder='Username'" required >
                </div>
                <div class="form-input key">
                    <span><i class="iconfont icon-mimashezhi"></i></span>
                    <input type="password" name="password"  onfocus="this.placeholder = '';" onblur="this.placeholder='*******';" placeholder="*******" required>
                </div>
                <div class="signin">
                    <input type="submit" value="登录" >
                </div>
            </form>

        </div>
    <script src="{{asset('photostyle/vendors/jquery/js/jquery.min.js')}}"></script>
  </body>
</html>



