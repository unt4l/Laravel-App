<!DOCTYPE html>
<html>
<head>
	<title>Your City Emergency Contact</title>
    <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  	<link href="<?php echo url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
<body>
	  @include('includes.header')
       <script type="text/javascript">
          $(document).ready(function () {
            $("#emergency").addClass("active");
          });
        </script>
    <div class="news-container container">
    	<div class="row">
    		<div class="news-main col col-md-8">
    			<div class="row">
    				<div class="col col-md-12">
    					<div class="panel panel-default">
    						<div class="news-title panel-heading">
		    					<h1>{{ $data['x1']['emergency_name'] }}</h1>
    						</div>
    						<div class="panel-body" style="padding-top: 0;">
    							<div class="row">
    								<img src="{{ $data['x1']['emergency_image'] }}" width="100%;">
    							</div>
    							<div class="row">
    								<div class="col col-md-12" style="padding: 30px;">
    									<p><b>Alamat:</b><br/>{{ $data['x1']['address'] }}</p>
                                        <p><b>Kontak:</b><br/>{{ $data['x1']['phone'] }}</p>
    								</div>
    							</div>
                                {{-- <div class="row">
                                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $data['x1']['geolocation']['lat'] }},{{ $data['x1']['geolocation']['lng'] }}&amp;output=embed"></iframe><br />
                                </div> --}}
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
    							<h4>Kontak Darurat Lainnya</h4>
    						</div>
    						<div class="panel-body">
                                @foreach($data['x2'] as $values)
    							<a href="{{ $values['id'] }}" class="row" style="padding: 10px;">
    								<div class="media">
    									<div class="media-left">
    										<img src="{{ $values['emergency_image'] }}" width="100px" height="100px">
    									</div>
    									<div class="media-body">
    										<h5 class="media-heading">{{ $values['emergency_name'] }}</h5>
    										<p>{{ $values['phone'] }}</p>
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