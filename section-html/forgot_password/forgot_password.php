<div class="row">
  <div class="col-lg-6 bgImage">
      <div class="row Main-img-text">
        <div class="col-lg-6 verti-align">
          <h1 class="main-text one-line-text  txt-color">{SITE_NAME}</h1>
        </div>
        <div class="col-lg-6 verti-align">
          <p class="sub-text one-line-text txt-color">THis is new content</p>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="container-fluid">
        <img src="{SITE_IMG}Bhejooo-Logo.png" class="logo" alt="">
        <h1 class="login-title">FORGOT PASSWORD</h1>
        <form action="" name="forgotPasswordForm" method="post" id="forgotPasswordForm" class="registerForm">
        <div class="input-group mb-3 top-input">
            <div>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email Address*">
            </div>
        </div>
        <!-- <div class="form-check check-forgot top-spacing">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember
          </label>
          <p class="forgot-pass">Forgot your password?</p>
        </div> -->
        <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary">SEND</button> <br>
        </form>
        <br>
        <a class="create-acc top-spacing" href="{SITE_URL}login">Login</a>
      </div>
      <footer id="login">
        <p>Copyright 2021 © Powered by <strong>Digitotal</strong></p>
      </footer>
    </div>
  </div>
<div class="clearfix"></div>


 <script>

    $(function(){
		
    $('#forgotPasswordForm').validate({
			rules : {
				email: {required: true,email:true},
			},
			messages:{
				email:{
					required:"Please enter email address.",
					email:"Please enter valid email address.",
				},
      },
			errorPlacement: function (error, element) { 
                if (element.attr("data-error-container")) { 
                    error.appendTo(element.attr("data-error-container"));

                } else {
                    error.insertAfter(element.closest('.form-control'));
                    error.css('color', "#ff0404");
                }
            },
			
			submitHandler: function(form) 
			{
        //lodding();
				var $btn = $('#submitBtn');
	      $btn.html('Loading...');
        $btn.attr('disabled',true);

	      var data = $(form).serializeArray();
				data.push({name: 'action', value: 'forgotPasswordForm'});

				$.ajax({
            url: window.location,
            type: form.method,
            data: data,
            dataType:'json',
            success: function(response) 
            {
            	
                if(response.status == 1)
                {	
                	$("#forgotPasswordForm")[0].reset();
                  window.location = "{SITE_URL}login";   
               	} 
                else 
                {
                	toastr['error'](response.message);
				        }
                $btn.html('SEND');
                $btn.attr('disabled',false);
            }
      	});
      }
		});
	});

</script>


