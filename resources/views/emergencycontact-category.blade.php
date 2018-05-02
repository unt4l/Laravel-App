<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your City Emergency Contact</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

      @include('includes.header')
        <script type="text/javascript">
          $(document).ready(function () {
            $("#emergency").addClass("active");
          });
        </script>
      <div class="container container-content">
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-emergency">Your City Emergency Contact</h3>
              <!-- <div style="border-bottom: 2px solid blue; float: right;">
            </div> -->
          </div>

          @foreach($x as $key => $data)

          <a href="emergencycontact-details/{{ $data['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $data['emergency_image'] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <p class="second-p-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;"><small>{{ $data["address"] }}</small></p>
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $data["emergency_name"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach




      </div> <!-- /container -->



   @include('includes.footer') 
  </body>
  </html>