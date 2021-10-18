<div class="logo">
  
</div>

<div class="content pre-load" style="display:none">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" name="loginform" action="" method="post">
        <?php //echo $this->objUser->getForm();?>
        <h3 class="form-title" style="text-align: center;" >Login to admin panel</h3>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label ">Username</label>
            <div class="input-iconn">
                
                <input class="form-control placeholder-no-fix login_username" type="text" autocomplete="off" name="uName"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label ">Password</label>
            <div class="input-iconn">
               
                <input class="form-control placeholder-no-fix login_username" type="password" autocomplete="off"  name="uPass"/>
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="submitLogin" value="submit">
            <button type="submit" name="submitLogin" class="btn green login_btn">
                Login 
            </button>
            
            <a href="javascript:void(0)" class="login_forgot_link" >Forgot Password ?</a>
            
        </div>
       
    </form>
</div>

<script type="text/javascript">
    $(function () {
        $('.pre-load').toggle();
    });
</script>
    