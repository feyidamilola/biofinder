<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Biofinder Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
    <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url('{{ asset('images/backend_images/login-bg.png') }}');" class="login">
    <div class="overlay">
      <div id="loginbox">    
        @if(Session::has('flash_message_error')) 
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   

        @if(Session::has('flash_message_success')) 
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif 
         @isset($password)
             {{ $password }}
         @endisset

        <form class="form-vertical" role="form" method="POST"  action="{{ url('/admin/login') }}">
            {{ csrf_field() }}
          <div class="control-group normal_text"> <h3><img src="{{ asset('images/backend_images/logo.png') }}" alt="Logo" /></h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <input id="email" type="email" name="email" placeholder="Username" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <input id="password" type="password" name="password" placeholder="Password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
          <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
            <div class="controls">
                <div class="main_input_box">
                    <input type="text" placeholder="E-mail address" />
                </div>
            </div>
           
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
            </div>
        </form>
      </div>
    </div>
    
    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>  
    <script src="{{ asset('js/backend_js/matrix.login.js') }}"></script> 
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }} "></script> 
</body>

</html>
