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
    </head>
    <body>

      <div class="omb_login">
        <h3 class="omb_authTitle">Reset Password</h3>
        <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                  <form class="omb_loginForm" action="<?php echo url('/forgotpassword') ?>" autocomplete="off" method="POST">
                    {{ csrf_field() }}
                    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}" />-->
                    <label for="Password">Input New Password</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                    <br/>
                    <label for="Password">Re-type New Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="password" class="form-control" name="password" required>
                      </div>
                      <br/>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Save New Password</button>
                  </form>
                </div>
              </div>

     @include('includes.footer') 
  </body>
  </html>