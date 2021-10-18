<div class="row">
    <div class="col-lg-6 bgImage">
      <div class="row Main-img-text">
        <div class="col-lg-6 verti-align">
          <h1 class="main-text one-line-text  txt-color">{SITE_NAME}</h1>
        </div>
        <div class="col-lg-6 verti-align">
          <p class="sub-text one-line-text txt-color">This is new content too</p>
        </div>
      </div>
    </div>

    <div class="col-lg-6">

      <div class="container-fluid">
        <img src="{SITE_IMG}Bhejooo-Logo.png" class="logo" alt="">
        <h1 class="login-title">REGISTER</h1>
        <form action="" name="registerForm" method="post" id="registerForm" class="registerForm">
                    
            <div class="input-group mb-3">
              <div>
                <input type="text" name="first_name" autocomplete="off" id="first_name" class="form-control" placeholder="Name*">
              </div>
              <div>
                <input type="text" name="company_name" autocomplete="off" id="company_name" class="form-control" placeholder="Company Name">
              </div> 
            </div>
            <div class="input-group mb-3">
              <div>
                <input type="text" autocomplete="off"  onkeypress="return isNumberKey(event);" name="mobile_no" id="mobile_no" class="form-control" placeholder="Phone*">
              </div>
              <div>
              <input type="text" name="user_email" autocomplete="off" id="user_email" class="form-control" placeholder="Email Address*">
              </div>
            </div>
            <div class="input-group mb-3">
              <div>           
                <input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password*">
              </div>
              <div>
              <input type="password" name="c_password" autocomplete="off" id="c_password" class="form-control" placeholder="Confirm Password*">
              </div>
            </div>
            <div class="input-group mb-3">
              <label class="form-control label-monOrder" style="color:#989898; border:none;">Monthly Orders</label>
              <select class="form-select form-select-sm" name="monthly_order" id="monthly_order">
                <option selected style="text-align:center; color:#989898;">0-100</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
        <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary">REGISTER</button> <br>
        </form>    

        <a class="create-acc top-spacing" href="{SITE_URL}login">Already have an account?</a>

      </div>

      <footer>
        <p>Copyright 2021 © Powered by <strong>Digitotal</strong></p>
      </footer>

    </div>
  </div>




<script>

  $(function(){
    $('#registerForm').validate({
			rules : {

				first_name:{required:true},
        mobile_no:{required:true , minlength:10,
          maxlength:10,},
				user_email: {required: true,email:true,
					remote: {
				        url: "{SITE_URL}register",
				        type: "post",
				        data: {
				          	email: function() {
				            	return $( "#user_email" ).val();
				          	},
				          	action:'checkEmailAddress'
				        }
				    }
				},
				password:{required:true,minlength:6},
        c_password:{equalTo: "#password",required:true},
      },
			messages:{
				first_name:{required:"Please enter name."},
        mobile_no:{required:"Please enter contact number.",
        minlength:"Please enter valid phone number.",
        maxlength:"Please enter valid phone number.",
        },
				user_email:{
					required:"Please enter email address.", 
					email:"Please enter valid email address.",
					remote:"This email address already registered."
				},
        password:{
          required:"Please enter password." 
        },
         c_password:{
            required:"Please enter confirm password",
                    equalTo: "Your password does not match."
                }
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
				data.push({name: 'action', value: 'registerFrom'});

				$.ajax({
	                url: window.location,
	                type: form.method,
	                data: data,
	                dataType:'json',
	                success: function(response) 
	                {
	                	  if(response.status == 1)
	                    {	
	                    	$("#registerForm")[0].reset();
	                      window.location = "{SITE_URL}login";   
	                   	} 
                      else 
                      {
	                    	toastr['error'](response.message);
							        }
	                    $btn.html('Register');
                      $btn.attr('disabled',false);
                  }
            	});
            }
		});
	});

</script>


