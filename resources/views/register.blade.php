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
        <h3 class="omb_authTitle">Sign Up</a></h3>

        <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">  
                  <form class="omb_loginForm" action="<?php echo url('/register') ?>" autocomplete="off" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" name="nama" placeholder="Full Name">
                    </div>
                    <span class="help-block"></span>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="tel" class="form-control" name="no_hp" placeholder="Phone Number">
                    </div>
                    <span class="help-block"></span>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                    <span class="help-block"></span>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <span class="help-block"></span>

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                      <input type="password" id="pwd" class="form-control" name="password" placeholder="Password" data-toggle="password">
                      <span class="input-group-addon"><button type="button" id="eye" style="padding: 0 !important; border: none !important; background-color: transparent;"><i class="fa fa-eye"></i></button></span>
                    </div>

                    <script>
                      function show() {
                        var p = document.getElementById('pwd');
                        p.setAttribute('type', 'text');
                      }

                      function hide() {
                        var p = document.getElementById('pwd');
                        p.setAttribute('type', 'password');
                      }

                      var pwShown = 0;

                      document.getElementById("eye").addEventListener("click", function () {
                        if (pwShown == 0) {
                          pwShown = 1;
                          show();
                        } else {
                          pwShown = 0;
                          hide();
                        }
                      }, false);
                    </script>

                    <span class="help-block"><!-- Password error --></span>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                  </form>
                </div>
              </div>

     @include('includes.footer') 
  </body>
  </html>