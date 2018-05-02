<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kota Anda - Citizen Living</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet">
  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

     @include('includes.header')
     
     <div class="container container-carousel">
      <div class="row">
        <div class="col-md-12">
          <div class="row carousel-holder">
            <div class="col-md-12">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img class="slide-image" src="<?php echo url('assets/img/bogor-header.png'); ?>" alt="">
                    <div class="header-text hidden-xs">
                      <div class="col-md-12 text-center">
                        <h3>
                          <span>Selamat Datang di kota mu</span>
                        </h3>
                        <h2>
                          <span>Discover about <span class="font-weight-300">Your City</span></span>
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img class="slide-image" src="<?php echo url('assets/img/bogor-header.png'); ?>" alt="">
                    <div class="header-text hidden-xs">
                      <div class="col-md-12 text-center">
                        <h3>
                          <span>Selamat Datang di kota mu</span>
                        </h3>
                        <h2>
                          <span>Discover about <span class="font-weight-300">Your City</span></span>
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img class="slide-image" src="<?php echo url('assets/img/bogor-header.png'); ?>" alt="">
                    <div class="header-text hidden-xs">
                      <div class="col-md-12 text-center">
                        <h3>
                          <span>Selamat Datang di kota mu</span>
                        </h3>
                        <h2>
                          <span>Discover about <span class="font-weight-300">Your City</span></span>
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img class="slide-image" src="<?php echo url('assets/img/bogor-header.png'); ?>" alt="">
                    <div class="header-text hidden-xs">
                      <div class="col-md-12 text-center">
                        <h3>
                          <span>Selamat Datang di kota mu</span>
                        </h3>
                        <h2>
                          <span>Discover about <span class="font-weight-300">Your City</span></span>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container container-content">

      <div class="row">
        <div class="col-md-12">
          <h3 class="title-content-news">Your City Latest News</h3>
              
          </div>

          @foreach($data["x1"] as $value)

          <a href="news-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['photos'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["title"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach
        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-event">Your City Events</h3>
          </div>
          @foreach($data["x2"] as $value)

          <a href="event-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['photos'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["event_title"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-poi">Your City Place of Interest</h3>
             
          </div>

          @foreach($data["x3"] as $value)

          <a href="placeofinterest-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['pictures'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["name"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach

        </div>
 
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-poi">Your City Emergency Contact</h3>
             
          </div>

          @foreach($data["x4"] as $value)

          <a href="emergencycontact-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['emergency_image'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["emergency_name"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach

        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-poi">Your City Public Transport</h3>
             
          </div>

          @foreach($data["x5"] as $value)

          <a href="publictransport-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['photos'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["transport_name"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach

        </div>


      </div>

      @include('includes.footer') 
    </body>
    </html>