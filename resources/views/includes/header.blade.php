<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></link> -->
<link href="<?php echo url('css/font-awesome.min.css'); ?>" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf_token" value="{{ csrf_token() }}">
<div class="navbar navbar-default navbar-fixed-top tall-navbar">
  <div class="container">
    <?php
    function humanTiming ($time)
    {

              $time = time() - $time;
              $time = ($time<1)? 1 : $time;
              $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
                );

              foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
              }

            }
            ?>

            <a href="/">
              <div class="navbar-header">

                <div class="navbar-brand logo font-city"><img src="<?php echo url('assets/img/icon.png'); ?>" alt="Your City">Citizen Living</div>
              </div>
            </a>

        </div>
      </div>
      <script>
        $(document).ready(function () {
            $(".nav a").on("click", function(){
               $(".nav").find(".active").removeClass("active");
               $(this).parent().addClass("active");
            });
         });
      </script>

      <div class="navbar navbar-inverse navbar-fixed-top second-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse main-nav">
            <ul class="nav navbar-nav">
              <li><a href="/"><img src="<?php echo url('assets/img/home.svg'); ?>" class="home-icon"></a></li>
              <li id="news"><a href="<?php echo url('news-category'); ?>">News</a></li>
              <li id="event"><a href="<?php echo url('event-category'); ?>">Event</a></li>
              <li id="poi"><a href="<?php echo url('placeofinterest-category')?>">Place of Interest</a></li>
              <li id="transport"><a href="<?php echo url('publictransport-category')?>">Public Transport</a></li>
              <li id="emergency"><a href="<?php echo url('emergencycontact-category')?>">Emergency Contact</a></li>
              @if(Session::get('username') !="")
                <li id="profil"><a href="<?php echo url('/profile')?>">Profil</a></li>
                <li id="logout"><a href="<?php echo url('/logout')?>">Logout</a></li>
              @else
              <li id="logout"><a href="<?php echo url('/login')?>">Login/Sign Up</a></li>
              @endif
              
            </ul>
          </div>
        </div>
      </div>