<?php include 'includes/header.php'; ?>
<style>
    body {
    height: auto;
     min-height: 85vh!important; 
    font-size: 100%;
}
.form-control, output {
    font-size: 14px;
    line-height: 1.42857143;
    color: #eef5f9;
    display: block;
}
.form-control, .form-group .form-control {
    border: 1px solid #ddd0;
    background-image: linear-gradient(#42a5f5fc, #42a5f5), linear-gradient(rgba(165, 181, 203, .5), rgba(165, 181, 203, .5));
    background-size: 0 2px, 100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom, center calc(100% - 0px);
    background-color: #00000000;
    transition: background 0s ease-out;
    /* float: none; */
    box-shadow: none;
    height: 34px;
    padding: 4px 10px 3px 10px;
    margin-bottom: 15px;
    border-radius: 3px;
}
</style>
<body id="auth_wrapper"  style="position: relative;background-image:linear-gradient( rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.36) ),  url('<?php echo base_url();?>Theme/assets/img/bg.jpg');background-position: top center;background-size: cover;">
  <div id="login_wrapper">

    <div id="login_content">
       <h1 class="brand-text" ><i class="zmdi zmdi-plus-circle-o" style="font-size:70px;font-weight: bold;color: #08b2d2cf;"></i> </h1>
      <h1 class="login-title">
       Patient Pulse Login
      </h1>    
       <center>
           <small id="res" class="display-block" style="text-align:center"></small>
       </center>
      <div class="login-body">
        <form>
          <div class="form-group label-floating is-empty">
            <label class="control-label">Email</label>
            <input type="email"  id="email"  autocomplete="off" class="form-control" >
          </div>
          <div class="form-group label-floating is-empty">
            <label class="control-label">Password</label>
            <input type="password"  id="password" autocomplete="off" class="form-control">
          </div>
          <a href="javascript:void(0)" class="forgot-pass pull-right">Forgot Password?</a>
          <div class="checkbox inline-block">
           
          </div>
           <button type="button" id="loginbtn" class="btn btn-info btn-block m-t-40"><i class="zmdi zmdi-lock-open"></i> Sign In</button>          
        </form>
      </div>  
    </div>
  </div>
  <?php include 'includes/footer-min.php'; ?>
    
<script type="text/javascript">
            $(document).ready(function() {
                 $('#password').keydown(function(event){    
            if(event.keyCode==13){
               $('#loginbtn').trigger('click');
            }
        });
                $('#loginbtn').click(function(){
                   // alert("hello");
                 $('#res').html("<img style='width:25px;height:25px;'  src='<?php echo base_url();?>Theme/assets/img/loading.gif'>");
               $email = $('#email').val();
               $password = $('#password').val();
               if($email == '' || $password == '')
               {
                   //alert('Please enter all login details.');
                    $('#res').html("<span style='color:red;text-transform:capitalize;font-size:13px'>Enter login details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('<?php echo base_url();?>Home/validateLogin',{ email:$email,password:$password},function(data){
                   //alert(data);
                  if(data==1) 
                  {	
                  	  $('#res').html("<span style='color:green;text-transform:capitalize;font-size:13px'>Login Success..!</span><br><img style='width:25px;height:25px;' src='<?php echo base_url();?>Theme/assets/img/loading.gif'><br><span style='font-size:12px'>Redirecting.....</span>");
                   
                          window.location="<?php echo base_url();?>";
                  }else{
//                    
                      $('#res').html("<span style='color:red;text-transform:capitalize;font-size:14px'>"+data+"</span>");
                  }
               });
            });
            });
            
        </script>
</body>

</html>
