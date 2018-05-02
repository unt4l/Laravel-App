<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Batu Smart City</title>

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
          <div class="col-sm-12 container">
            <form action="<?php echo url('/update') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="panel panel-default" style="position: relative; margin-left: 3%; margin-top: 2%;">
                <div class="loader-container">
                  <div class="loader"></div>
                </div>
                <div class="panel-heading">
                  <h3 style="color: #4c4c4c; text-transform: capitalize; text-align: center;">{{ $data->full_name }}'s Profile</h3>
                </div>
                <div class="panel-body" style="background-color: white; padding: 50px">
                  <div class="col-sm-4">
                    <div class="thumbnail" style="border: none">
                        <img class="img-responsive img-circle" id="profileImg" src="{{ $data->photo }}" style="box-shadow: 1px 1px 11px rgba(0, 0, 0, 0.6); height: 240px; width: 240px">
                      <div class="caption" align="center" style="margin-top: 10px">
                      <!-- <form enctype="multipart/form-data" action="" method="POST">
                        <input id="uploadImg" type="file" name="image" accept="image/*" onchange="uploadImage(event)" />
                        <img src="" alt="" style="display: none;" id="image">
                       </form> -->
                        <input id="uploadImg" type="file" name="image" onchange="readUrl(this);" />
                        <input type="hidden" name="originalImage" value="{{ $data->photo }}">
                      </div>                                
                    </div>
                  </div>
                    
                  <div class="col-sm-8">
                      <div class="form-group">
                        <h4 class="col-md-10">Account Info</h4>
                        <!--div class="col-md-2">
                          <button id="enableEdit" class="btn"><span class="fa fa-pencil" style="color: #4c4c4c"></span></button>
                        </div-->
                      </div>
                    

                      <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-7">
                          <input type="text" value="{{ $data->full_name }}" name="name" value="" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="username" class="col-md-3 control-label">Username</label>
                        <div class="col-md-7">
                          <input type="text" value="{{ $data->username }}" name="username" value="" class="form-control" readonly disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-7">
                          <input type="email" value="{{ $data->email }}" name="email" value="" class="form-control" readonly disabled>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">No. HP</label>
                        <div class="col-md-7">
                          <input type="number" value="{{ $data->phone }}" name="phone" value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="container col-sm-12 text-center">
                      <button type="submit" class="btn btn-primary" style="width: 150px">Save Changes</button>
                      <button type="reset" class="btn btn-default" style="width: 150px">Reset</button>
                    </div>
                  </div>
                  
              </div>
              
            </form>
            
            </div>
            
          </div>
        </div>
      </div>
    </div> <!-- /container -->


      @include('includes.footer') 

      <script type="text/javascript">
       function readUrl(input) {
      if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
          $('#profileImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
      </script>

  {{-- <script type="text/javascript">

  function readUrl(input) {
    console.log('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>MULAI');
      if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
          $('#profileImg').attr('src', e.target.result);
          console.log('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>MULAI READ URL');
        }

        reader.readAsDataURL(input.files[0]);
        console.log('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>MULAI READ DATA');
      }
    }

    $(document).ready(function() {
      $('#profileForm').submit(function(e) {
          var formData = new FormData(this);
          console.log('>>>>>>>>>>>>>>>>>>>>>>>>>setup header');
          $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
          });
          $.ajax({
            url: '/updateProfile',
            type: 'PUT',
            data: formData,
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,    
            processData: false,
            beforeSend: function() {
              
            },
            success: function(data) {
              console.log(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
              
            },
            complete: function() {
             
              window.location.href = '/profile';
            }
          });

      });
    });
    
  </script>


<script>

  jQuery(document).ready(function(){

    $(document).on('click','#enableEdit', function() {
        $('#profileForm input').prop('readonly', false);
        $('#profileForm input:not(#uploadImg)').prop('required', true);
        $(this).prop('disabled', true);
    });
  });
</script>

   <script>
jQuery(document).ready(function(){
    
    $(".loader-container").hide();

    "use strict";
    
    // Select2
  jQuery(".select2").select2({
    width: '100%',
    minimumResultsForSearch: -1
  });
  
  // Basic Form
  jQuery("#profileForm").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
  
  // Error Message In One Container
  jQuery("#basicForm2").validate({
   errorLabelContainer: jQuery("#basicForm2 div.error")
  });
  
  // With Checkboxes and Radio Buttons
  jQuery("#basicForm3").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
  
  // Validation with select boxes
  jQuery("#basicForm4").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });
  
  
});
</script> --}}
    </body>
    </html>