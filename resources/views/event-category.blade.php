<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Your City Events</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

      @include('includes.header')
       <script type="text/javascript">
          $(document).ready(function () {
            $("#event").addClass("active");
          });
        </script>
      <div class="container container-content">

        <div class="row">
          <div class="col-md-12">
            <h3 class="title-content-event">Your City Events</h3>
              <!-- <div style="border-bottom: 2px solid blue; float: right;">
            </div> -->
          </div>

          @foreach($x as $key => $value)

          <a href="event-details/{{ $value['id'] }}">
            <div class="col-md-4">
              <div class="panel panel-default panel-content panel-content-color-a">
                <img src="{{ $value['photos'][0] }}" class="image-size">
                <div class="panel-body panel-padding">
                  <p class="second-p-style"><small><?= date("D, d F Y - H:m", strtotime($value['event_date'])) ?></small></p>
                  <h4 class="h4-style" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $value["event_title"] }}</h4>
                </div>
              </div>
            </div>
          </a>

          @endforeach

      </div> <!-- /container -->


   @include('includes.footer') 
  </body>
  </html>