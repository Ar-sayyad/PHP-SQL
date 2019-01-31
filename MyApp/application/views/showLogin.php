<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Auto IT | Login</title>
 
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"87e617fe26d58954b6ac66b8a081629a",petok:"ef4497f35f8a6b7bc1e6028fb5b98a002056f493-1447830371-1800",zone:"adbee.technology",rocket:"0",apps:{"ga_key":{"ua":"UA-49262924-2","ga_bs":"2"}},sha2test:0}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="../ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3d247a80cdfa/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
//]]>
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/bootstrap/bootstrap.min.css"/>
 
<script src="<?php echo base_url();?>partnerIT/js/demo-rtl.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/nanoscroller.css"/>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/compiled/theme_styles.css"/>
 
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>-->
 
<link type="image/x-icon" href="<?php echo base_url();?>partnerIT/img/logo-small.png" rel="shortcut icon"/>

<script type="text/javascript">
/* <![CDATA[ */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-49262924-2']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

(function(b){(function(a){"__CF"in b&&"DJS"in b.__CF?b.__CF.DJS.push(a):"addEventListener"in b?b.addEventListener("load",a,!1):b.attachEvent("onload",a)})(function(){"FB"in b&&"Event"in FB&&"subscribe"in FB.Event&&(FB.Event.subscribe("edge.create",function(a){_gaq.push(["_trackSocial","facebook","like",a])}),FB.Event.subscribe("edge.remove",function(a){_gaq.push(["_trackSocial","facebook","unlike",a])}),FB.Event.subscribe("message.send",function(a){_gaq.push(["_trackSocial","facebook","send",a])}));"twttr"in b&&"events"in twttr&&"bind"in twttr.events&&twttr.events.bind("tweet",function(a){if(a){var b;if(a.target&&a.target.nodeName=="IFRAME")a:{if(a=a.target.src){a=a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);b=0;for(var c;c=a[b];++b)if(c.indexOf("url")===0){b=unescape(c.split("=")[1]);break a}}b=void 0}_gaq.push(["_trackSocial","twitter","tweet",b])}})})})(window);
/* ]]> */
</script>
</head>
<body id="login-page-full">
<div id="login-full-wrapper">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div id="login-box">
<div id="login-box-holder">
<div class="row">
<div class="col-xs-12">
<header id="login-header">
<div id="login-logo">
<img src="<?php echo base_url();?>partnerIT/img/logo.png" alt=""/>
</div>
</header>
<div id="login-box-inner">
<center><div id="res"></div></center><br>
<form role="form" method="post" action="#">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input class="form-control" name="loginEmail" id="loginEmail" type="text" placeholder="Email address">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
</div>

<div class="row">
<div class="col-xs-12">
<button type="button" id="loginSubmit" class="btn btn-success col-xs-12">Login</button>
</div>
</div>
<div id="remember-me-wrapper">
<div class="row">
<a href="<?php echo base_url();?>index.php/TestApp/forgotPassword/" id="login-forget-link" class="col-xs-12">
Forgot password?
</a>
</div>
</div>	

</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

<?php //include('skin.php');?>
 
<script src="<?php echo base_url();?>partnerIT/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url();?>partnerIT/js/jquery.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/demo.js"></script>   
<script src="<?php echo base_url();?>partnerIT/js/scripts.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
                $('#loginPassword').keydown(function(event){    
                       if(event.keyCode==13){
                          $('#loginSubmit').trigger('click');
                       }
                   });
                $('#loginSubmit').click(function(){
                  // alert("hello");
                 $('#res').html("<img width='20' src='<?php echo base_url();?>partnerIT/img/loader.GIF'>");
               $loginEmail = $('#loginEmail').val();
               $loginPassword = $('#loginPassword').val();
               if($loginEmail == '' || $loginPassword == '')
               {
                    $('#res').html("<span style='color:red;text-transform:capitalize;font-size:14px'>Enter Login Details..!</span>");
                   return false;
               }
//               $(this).attr('disabled','disabled');
               $.post('<?php echo base_url();?>index.php/TestApp/validate_login',{ loginEmail:$loginEmail,loginPassword:$loginPassword},function(data){
                  //alert(data);
                  if(data==1) 
                  {	
                        $('#res').html("<h5><span style='color:green;text-transform:capitalize;font-size:14px'>Login Success..!</span><br><img width='20' src='<?php echo base_url();?>/partnerIT/img/loader.GIF'><br><span style='font-size:14px'>Redirecting.....</span></h5>");
                      window.location="<?php echo base_url();?>";
                  }else{
//                    
                      $('#res').html("<h5><span style='color:red;text-transform:capitalize;font-size:14px'>Invalid login Details.</span></h5>");
                  }
               });
            });
        });            

</script>
 
</body>

</html>