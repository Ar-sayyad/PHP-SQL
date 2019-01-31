<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title><?php echo $page_title;?> | Company Admin</title>
 
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"87e617fe26d58954b6ac66b8a081629a",petok:"e79be0a3500182d166c1a08e6e8c0097ceba761a-1447830365-1800",zone:"adbee.technology",rocket:"0",apps:{"ga_key":{"ua":"UA-49262924-2","ga_bs":"2"}},sha2test:0}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="../ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3d247a80cdfa/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
//]]>
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/bootstrap/bootstrap.min.css"/>
 
<script src="<?php echo base_url();?>partnerIT/js/demo-rtl.js"></script>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/nanoscroller.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/custom.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/compiled/theme_styles.css"/>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-default.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-style-growl.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-style-bar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-style-attached.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-style-other.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>partnerIT/css/libs/ns-style-theme.css"/>
 
<link type="image/x-icon" href="<?php echo base_url();?>partnerIT/img/logo-small.png" rel="shortcut icon"/>
 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>-->
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
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
<body>
<div id="theme-wrapper">
<header class="navbar" id="header-navbar">
<div class="container">
<a href="<?php echo base_url();?>" id="logo" class="navbar-brand">
<img src="<?php echo base_url();?>partnerIT/img/logo.png" alt="" class="normal-logo logo-white"/>
<img src="<?php echo base_url();?>partnerIT/img/logo-black.png" alt="" class="normal-logo logo-black"/>
<img src="<?php echo base_url();?>partnerIT/img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
</div>
<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right">
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--<img src="<?php echo base_url();?>partnerIT/img/samples/scarlet-159.png" alt=""/>-->
<span class="hidden-xs"><?php echo $this->session->userdata('name');?></span> <b class="caret"></b>
</a>
<ul class="dropdown-menu dropdown-menu-right">
<li><a href="<?php echo base_url();?>index.php/Administrator/profile/"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="<?php echo base_url();?>index.php/Administrator/logout/"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</li>
<li class="hidden-xxs">
<a href="<?php echo base_url();?>index.php/Administrator/logout/" class="btn">
<i class="fa fa-power-off"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
</header>

 <?php include('modal.php');?>