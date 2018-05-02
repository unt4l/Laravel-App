<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Search</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
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

      <div class="container container-content">
        <hgroup class="mb20">
          <h1>Search Results</h1>
          <h2 class="lead"><strong class="text-danger">{{ $data["x7"] }}</strong> results were found for the search for <strong class="text-danger">{{ $data["x6"] }}</strong></h2>               
        </hgroup>

        <section class="col-xs-12 col-sm-6 col-md-12">
          @foreach($data["x1"] as $value)

          <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
            <a href="news-details/{{ $value['id'] }}" title="{{ $value['title'] }}" class="thumbnail"><img src="{{ $value['photos'] }}" alt="{{ $value['title'] }}" width="100px" style="height:100px;" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
              <h3><a href="news-details/{{ $value['id'] }}" title="{{ $value['title'] }}">{{ $value['title'] }}</a></h3>
              <p><?= humanTiming(strtotime(date("Y-m-d H:m:s", strtotime( $value['created_at'] ))))." ago"; ?></p>
            </div>
            <span class="clearfix border"></span>
          </article>  

          @endforeach

          @foreach($data["x2"] as $value)

          <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
            <a href="event-details/{{ $value['id'] }}" title="{{ $value['event_title'] }}" class="thumbnail"><img src="{{ $value['photos'] }}" alt="{{ $value['event_title'] }}" width="100px" style="height:100px;" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
              <h3><a href="event-details/{{ $value['id'] }}" title="{{ $value['event_title'] }}">{{ $value["event_title"] }}</a></h3>
              <p><?php echo date("D, d F Y - H:m", strtotime( $value['event_date'] )); ?></p>
            </div>
            <span class="clearfix border"></span>
          </article>  

          @endforeach

          @foreach($data["x3"] as $value)

          <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
            <a href="placeofinterest-details/{{ $value['id'] }}" title="{{ $value['place_name'] }}" class="thumbnail"><img src="{{ $value['photos'][0] }}" alt="{{ $value['place_name'] }}" width="100px" style="height:100px;" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
              <h3><a href="placeofinterest-details/{{ $value['id'] }}" title="{{ $value['place_name'] }}">{{ $value["place_name"] }}</a></h3>
              <p>{{ $value["category"] }}</p>
            </div>
            <span class="clearfix border"></span>
          </article>  

          @endforeach

        </section>


      <!-- <div class="row clearfix">
        <div class="col-md-12 column">
          <ul class="pagination">
            <li>
              <a href="#">Prev</a>
            </li>
            <li>
              <a href="#">1</a>
            </li>
            <li>
              <a href="#">2</a>
            </li>
            <li>
              <a href="#">3</a>
            </li>
            <li>
              <a href="#">4</a>
            </li>
            <li>
              <a href="#">5</a>
            </li>
            <li>
              <a href="#">Next</a>
            </li>
          </ul>
        </div>
      </div> -->


    </div>



    @include('includes.footer') 
  </body>
  </html>