<!DOCTYPE html>
<html>
<head>
	<title>Your City Places</title>
    <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
</head>
<body>
    <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=151438128277365";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        @include('includes.header')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#poi").addClass("active");
            });
        </script>

        <div class="news-container container">
            <div class="row">
                <div class="news-main col col-md-8">
                    <div class="row">
                        <div class="col col-md-12">
                            <div class="panel panel-default">
                                <div class="news-title panel-heading">
                                    <h1>{{ $data['x1']['name'] }}</h1>
                                    <p>Phone Number: {{ $data['x1']['phone_number'] }} </p>
                    <div style="display: flex; flex-flow: row wrap;">
                        <div class="fb-share-button"
                            data-href="{{ $data['x1']['id'] }}"
                            data-layout="button"
                            data-size="large"
                            data-mobile-iframe="true">
                            <a class="fb-xfbml-parse-ignore"
                            target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('/placeofinterest-details/'.$data["x1"]["id"]) ?>">
                                Share
                            </a>
                        </div>
                            <a href="https://twitter.com/intent/tweet?text={{ $data['x1']['name'] }}"
                            class="twitter-share-button"
                            data-show-count="false"
                            data-size="large">Tweet
                            </a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    </div>
    						<div class="panel-body" style="padding-top: 0; padding-bottom: 0;">
    							<div class="row">
    								<img src="{{ $data['x1']['pictures'][0] }} " width="100%;">

                                    <div class="col-md-12" style="padding:0px;">
                                        <ul class="horizontal-slide first">
                                            @if(isset($data['x1']['pictures'][0]))
                                               @foreach($data['x1']['pictures'] as $key => $value)
                                                    <li class="col-md-3" style="padding: 0;">
                                                        <button type="button" data-toggle="modal" data-target="#myMenu" style="padding: 0; border: none; background-color: white;"><img class="thumbnail" style="width: 100%; margin-bottom: 0; padding: 0;" src="{{ $value }}"/></button>
                                                    </li>
                                                @endforeach 
                                            @endif
                                        </ul>
                                    </div>
    							</div>

    							<div class="row">
    								<div class="col col-md-12" style="padding: 30px;">
                                    <p style="text-align: justify;">{{ $data['x1']['description'] or '' }}</p>
    								</div>
    							</div>
                                  <div class="row">
                                      <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $data['x1']['geolocation']['lat'] }},{{ $data['x1']['geolocation']['lng'] }}&amp;output=embed"></iframe><br />
                                  </div>
                                  @foreach($data['x4'] as $value)

                        @if(Session::get('username')!=null)
                            @if($data['x5'] != null)
                            <div style="display: flex; flex-flow: row wrap;">
                                <div>
                                        <form action="<?php echo url('/favs')?>" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="title" value="{{ $data['x1']['name'] }}">
                                            <input type="hidden" name="userId" value="{{ Session::get('userId') }}">
                                            <input type="hidden" name="id" value="{{ $data['x1']['id'] }}">
                                                <button class="btn btn-sm btn-default" type="submit" disabled>
                                                    <span class="glyphicon glyphicon-heart"> 
                                                        {{ $data['x4']['count'] }} 
                                                    </span>
                                                    Like
                                                </button>
                                            </form>
                                </div>
                                <div>
                                        <form action="<?php echo url('/unfavs')?>" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="likeId" value="{{ $data['x5'][0]->id }}">
                                            <button class="btn btn-sm btn-default" type="submit">Unlike</button>
                                            </form>
                                </div>
                            </div>
                            @else
                            <div style="display: flex; flex-flow: row wrap;">
                                    <div>
                                            <form action="<?php echo url('/favs')?>" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="title" value="{{ $data['x1']['name'] }}">
                                                <input type="hidden" name="userId" value="{{ Session::get('userId') }}">
                                                <input type="hidden" name="id" value="{{ $data['x1']['id'] }}">
                                                    <button class="btn btn-sm btn-default" type="submit">
                                                        <span class="glyphicon glyphicon-heart"> 
                                                            {{ $data['x4']['count'] }} 
                                                        </span>
                                                        Like
                                                    </button>
                                                </form>
                                    </div>
                                    <div>
                                            <form action="<?php echo url('/unfavs')?>" method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-sm btn-default" type="submit" disabled>
                                                    Unlike
                                                </button>
                                                </form>
                                    </div>
                                </div>
                            @endif
                            @else

                            @endif
                            
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="news-sidebar col col-md-4">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="panel panel-default">
                            <div class="sidebar-title panel-heading">
                                <h4>Place of Interest Terbaru</h4>
                            </div>
                            <div class="panel-body">
                                @foreach($data['x2'] as $values)
                                <a href="{{ $values['id'] }}" class="row" style="padding: 10px;">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ $values['pictures'][0] }}" width="100px" height="100px">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">{{ $values['name'] }}</h5>
                                            {{-- <p> Jam Buka: {{ $values['wkt'] }}</p> --}}
                                        </div>
                                    </div>
                                </a> 
                                @endforeach   							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    
    </div>
</div>

    <!-- View Menu -->
    <!-- Modal -->
    <div class="modal fade" id="myMenu" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <img src="{{ $data['x1']['pictures'][0] }}" width="100%"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" style="float:left;">Prev</button>
            <button type="button" class="btn btn-default">Next</button>
          </div>
        </div>
        
      </div>
    </div>

    @include('includes.footer') 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

<script type="text/javascript">
    $(document).ready(function() {

        var bookmark = [];
        var id = $('.like-Unlike').attr('id');
        var favorited = false;



        if(localStorage.getItem('bookmark')) {
            bookmark = JSON.parse(localStorage.getItem('bookmark'));

            console.log(bookmark);

            if(bookmark.indexOf(id) == -1) {
              favorited = false;
              console.log(id);
              $('.like-Unlike').removeClass('btn-success');
              $('.like-Unlike').addClass('btn-default');
              $('.like-Unlike').html('<span class="fa fa-bookmark"></span> Bookmark');
              
            }
            else {
              favorited = true;
              $('.like-Unlike').removeClass('btn-default');
              $('.like-Unlike').addClass('btn-success');
              $('.like-Unlike').html('<span class="fa fa-bookmark"></span> Bookmarked');
            }
        }

        localStorage.setItem('halo','');

        $(".like-Unlike").click(function(e) {

            if(bookmark) {
                if(bookmark.indexOf(id) == -1) {
                  bookmark.push(id);
                  favorited = true;
                  $('.like-Unlike').removeClass('btn-default');
                  $('.like-Unlike').addClass('btn-success');
                  $('.like-Unlike').html('<span class="fa fa-bookmark"></span> Bookmarked');
                }
                else {
                  bookmark.splice(bookmark.indexOf(id), 1);
                  favorited = false;
                  $('.like-Unlike').removeClass('btn-success');
                  $('.like-Unlike').addClass('btn-default');
                  $('.like-Unlike').html('<span class="fa fa-bookmark"></span> Bookmark');
                }
            }
            else {
                bookmark.push(id);
            }

            localStorage.setItem('bookmark', JSON.stringify(bookmark));
        })
    });
</script>
</html>