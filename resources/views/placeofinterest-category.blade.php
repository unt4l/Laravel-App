<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your City Places</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
    </head>
    <body>

       @include('includes.header')
       <script type="text/javascript">
          $(document).ready(function () {
            $("#poi").addClass("active");
          });
        </script>

      <div class="container container-content">
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-poi">Your City Place of Interest</h3>
          </div>

          @foreach($x as $key => $value)

          <a href="placeofinterest-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['pictures'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <p class="second-p-style"><small>{{ $value["name"] }}</small></p>
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["address"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach

      </div>

  @include('includes.footer') 
  </body>
  </html>