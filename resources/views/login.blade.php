<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Smart City</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style-login.css" rel="stylesheet">
  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <div class="omb_login">
        <h3 class="omb_authTitle">Login or <a href="{{url('/signup')}}">Sign up</a></h3>
        @if(Session::has('message'))
        <div class="alert {{Session::get('alert-class')}} alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ Session::get('alert-info') }}</strong> {{ Session::get('message') }}
          </div>
        @endif
        <!-- <div class="row omb_row-sm-offset-3 omb_socialButtons">
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
              <i class="fa fa-facebook visible-xs"></i>
              <span class="hidden-xs">Facebook</span>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
              <i class="fa fa-twitter visible-xs"></i>
              <span class="hidden-xs">Twitter</span>
            </a>
          </div>  
          <div class="col-xs-4 col-sm-2">
            <a href="#" class="btn btn-lg btn-block omb_btn-google">
              <i class="fa fa-google-plus visible-xs"></i>
              <span class="hidden-xs">Google+</span>
            </a>
          </div>  
        </div>

        <div class="row omb_row-sm-offset-3 omb_loginOr">
          <div class="col-xs-12 col-sm-6">
            <hr class="omb_hrOr">
            <span class="omb_spanOr">or</span>
          </div>
        </div> -->

        <div class="row omb_row-sm-offset-3">
          <div class="col-xs-12 col-sm-6">  
            <form class="omb_loginForm" action="<?php echo url('auth') ?>" autocomplete="off" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="username or email address">
              </div>
              <span class="help-block"></span>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input  type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <br>

              <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
          </div>
        </div>
        <div class="row omb_row-sm-offset-3">
          <div class="col-xs-12 col-sm-3">
            <label class="checkbox">
              <input type="checkbox" value="remember-me">Remember Me
            </label>
          </div>
          <div class="col-xs-12 col-sm-3">
            <p class="omb_forgotPwd">
              <a href="{{url('/forgot')}}">Forgot password?</a>
            </p>
          </div>
        </div>        
      </div>
     @include('includes.footer') 
  </body>
  </html>