<!DOCTYPE html>
<html>
<head>
	<title>Your City News</title>
	<link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/style.css'); ?>" rel="stylesheet">
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
            $("#news").addClass("active");
          });
        </script>

    <div class="news-container container">
    	<div class="row">
    		<div class="news-main col col-md-8">
    			<div class="row">
    				<div class="col col-md-12">
    					<div class="panel panel-default">
    						<div class="news-title panel-heading">
		    					<h1>{{ $data['x1']['title'] }}</h1>
                                <div style="display: flex; flex-flow: row wrap;">
                                    <div class="fb-share-button"
                                    data-href="{{ $data['x1']['id'] }}"
                                    data-layout="button"
                                    data-size="large"
                                    data-mobile-iframe="true">
                                      <a class="fb-xfbml-parse-ignore"
                                      target="_blank"
                                      href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('/news-details/'.$data["x1"]["id"]) ?>">
                                        Share
                                      </a>
                                    </div>
                                    
                                    <a href="https://twitter.com/intent/tweet?text={{ $data['x1']['title'] }}"
                                    class="twitter-share-button"
                                    data-show-count="false"
                                    data-size="large">Tweet
                                    </a>
                                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>

    						</div>
    						<div class="panel-body" style="padding-top: 0;">
    							<div class="row">
    								<img src="{{ $data['x1']['photos'][0] }}" width="100%">
    							</div>
    							<div class="row">
    								<div class="col col-md-12" style="padding: 30px;">
    									<p style="font-weight: 400;"><?= htmlspecialchars_decode(stripslashes($data['x1']['description'])); ?></p>
                                        <p class="news-p"><?= date("D, d F Y - H:m", strtotime( $data['x1']['posted_date'] )); ?> oleh {{ $data['x1']['author'] }}</p>
    								</div>
								</div>
								<div class="row">
									<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.youtube.com/embed/{{$data['x1']['videos'][0]}}"></iframe><br />
								</div>
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
    							<h4>Berita Terbaru</h4>
    						</div>
    						<div class="panel-body">
                                @foreach($data['x2'] as $values)
    							<a href="{{ $values['id'] }}" class="row" style="padding: 10px;">
    								<div class="media">
    									<div class="media-left">
    										<img src="{{ $values['photos'][0] }}" width="100px" height="100px">
    									</div>
    									<div class="media-body">
    										<h5 class="media-heading">{{ $values['title'] }}</h5>
    										<p><?= humanTiming(strtotime(date("Y-m-d H:m:s", strtotime( $values['posted_date'] ))))." ago"; ?></p>
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
    @include('includes.footer') 
</body>
</html>