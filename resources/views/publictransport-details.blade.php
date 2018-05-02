<!DOCTYPE html>
<html>
<head>
	<title>Your City Transportation</title>
    <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	  @include('includes.header')
      <script type="text/javascript">
          $(document).ready(function () {
            $("#transport").addClass("active");
          });
      </script>

    <div class="news-container container">
    	<div class="row">
    		<div class="news-main col col-md-8">
    			<div class="row">
    				<div class="col col-md-12">
    					<div class="panel panel-default">
    						<div class="news-title panel-heading">
		    					<h1>{{ $data['x1']['transport_name'] }} </h1>
                                <p>Jurusan: {{ $data['x1']['initial_route'] }} </p>
                                <p>Jam Operasional: {{ $data['x1']['operational_hours'] }} </p>
		    					<p>Tarif: Rp.{{ $data['x1']['fare'] }} </p>
    						</div>
    						<div class="panel-body" style="padding-top: 0;">
    							<div class="row">
    								<img src="{{ $data['x1']['photos'][0] }} " width="100%">
    							</div>
    							<div class="row">
    								<div class="col col-md-12" style="padding: 30px;">
    									<p style="text-align: justify;"><?= htmlspecialchars_decode(stripslashes($data['x1']['description'])); ?> </p>
    								</div>
    							</div>
                                <div class="row">
                                    <img src="{{ $data['x1']['route_photos'][0] }} " width="100%">
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
    							<h4>Public Transportation Lainnya</h4>
    						</div>
    						<div class="panel-body">
                              	 @foreach($data['x2'] as $key => $value)
                                <a href="{{ $value['id'] }}" class="row" style="padding: 10px;">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ $value['photos'][0] }}" width="100px" height="100px">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">{{ $value['transport_name'] }}</h5>
                                            {{-- <p>{{ $value['short_desc']  }}</p> --}}
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