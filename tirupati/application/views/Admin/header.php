<!DOCTYPE html>
<html>

<!-- Mirrored from cube.adbee.technology/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:05:43 GMT -->
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Tirupati |<?php echo $page_title;?></title>
 
<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok3v=1613a3a185/"},atok:"87e617fe26d58954b6ac66b8a081629a",petok:"85cf0d16b22b140961591586f981c6a5449ee918-1447830341-1800",zone:"adbee.technology",rocket:"0",apps:{"ga_key":{"ua":"UA-49262924-2","ga_bs":"2"}},sha2test:0}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="../ajax.cloudflare.com/cdn-cgi/nexp/dok3v%3d247a80cdfa/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
//]]>
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap/bootstrap.min.css';?>"/>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css';?>"/>
<script src="<?php echo base_url().'assets/js/demo-rtl.js';?>"></script>
 
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/libs/font-awesome.css';?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/libs/nanoscroller.css';?>"/>
 
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/compiled/theme_styles.css';?>"/>
 
<link rel="stylesheet" href="<?php echo base_url().'assets/css/libs/daterangepicker.css" type="text/css';?>"/>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/libs/jquery-jvectormap-1.2.2.css';?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/libs/weather-icons.css';?>" type="text/css"/>
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/libs/datepicker.css';?>" type="text/css"/>
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/libs/select2.css';?>" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
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
<a href="<?php echo base_url().'home';?>" id="logo" class="navbar-brand">
<img src="<?php echo base_url().'assets/img/logo.png';?>" alt="" class="normal-logo logo-white"/>
<img src="<?php echo base_url().'assets/img/logo-black.png';?>" alt="" class="normal-logo logo-black"/>
<img src="<?php echo base_url().'assets/img/logo-small.png';?>" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
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

<?php if($this->session->userdata('admin_profile')!=""){?>
 <img src="<?php echo base_url();?>assets/uploads/profile/<?php echo $this->session->userdata('admin_profile') ?>" alt=""/> 
 <?php
}
?>
<span class="hidden-xs"><?php echo $this->session->userdata('admin_email');?></span> <b class="caret"></b>
</a>
<ul class="dropdown-menu dropdown-menu-right">
<li><a href="<?php echo base_url().'home/profile';?>"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="<?php echo base_url().'home/logout';?>"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</li>
<li class="hidden-xxs">
<a href="<?php echo base_url().'home/logout';?>" class="btn">
<i class="fa fa-power-off"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
</header>


<div id="page-wrapper" class="container">
<div class="row">
<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<!-- <div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
<img alt="" src="<?php echo base_url().'assets/img/samples/scarlet-159.png';?>"/>
<div class="user-box">
<span class="name">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php echo $this->session->userdata('admin_email');?>
<i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url().'home/profile';?>"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="<?php echo base_url().'home/logout';?>"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</span>
</div>
</div> -->
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<!-- <li class="nav-header nav-header-first hidden-sm hidden-xs">
Navigation
</li> -->

<li class="active">
<a href="<?php echo base_url().'home';?>">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span> 
</a>
</li>


<!-- <li>
<a href="<?php echo base_url().'home';?>" class="dropdown-toggle">
<i class="fa fa-wrench"></i>
<span>Basic</span> 
<i class="fa fa-angle-right drop-icon"></i>
</a>
<ul class="submenu">
<li>
<a href="<?php echo base_url().'home/vehicleType';?>">
<span>Type</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/vehicleModel';?>">
<span>Model</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/sparesPart';?>">
<span>Spares</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/servicingType';?>">
<span>Servicing Type</span> 
</a>
</li>
</ul>
</li> --> 

<li>
<a href="<?php echo base_url().'home';?>" class="dropdown-toggle">
<i class="fa fa-wrench"></i>
<span>Basic</span> 
<i class="fa fa-angle-right drop-icon"></i>
</a>
<ul class="submenu">

<li>
<a href="<?php echo base_url().'home/VehicleOwner';?>">
<span>Vehicle Owner</span> 
</a>
</li>


<li>
<a href="<?php echo base_url().'home/addVehicle';?>">
<span>Vehicle</span> 
</a>
</li>


<li>
<a href="<?php echo base_url().'home/driver';?>">
<span>Driver</span> 
</a>
</li>


</ul>
</li>
<li>
<a href="<?php echo base_url().'home/assgin';?>">
<i class="fa fa-users"></i>
<span>Assign Driver To Vehicle</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/SubAdmin';?>">
<i class="fa fa-users"></i>
<span>Subadmin</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/Vendors';?>">
<i class="fa fa-users"></i>
<span>Vendors</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/assign_fuel';?>">
<i class="fa fa-users"></i>
<span>Fuel Assigned Vehicle</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/fule_Receipt';?>">
<i class="fa fa-users"></i>
<span>Fuel Receipt</span> 
</a>
</li>
<li>
<a href="<?php echo base_url().'home/Supervisor';?>">
<i class="fa fa-users"></i>
<span>Supervisor</span> 
</a>
</li>




<!-- <li>
<a href="<?php echo base_url().'home/vehicleServicing';?>">
<i class="fa fa-users"></i>
<span>Servicing</span> 
</a>
</li> -->
<!-- <li>
<a href="<?php echo base_url().'home/trip';?>">
<i class="fa fa-users"></i>
<span>Trip</span> 
</a>
</li> -->
<!-- <li>
<a href="<?php echo base_url().'home/dieselEntry';?>">
<i class="fa fa-users"></i>
<span>Diesel</span> 
</a>
</li> -->
<!-- <li>
<a href="<?php echo base_url().'home/tyresInfo';?>">
<i class="fa fa-users"></i>
<span>Tyres</span> 
</a>
</li> -->

<!-- <li>
<a href="<?php echo base_url().'home/user';?>">
<i class="fa fa-users"></i>
<span>Users</span> 
</a>
</li> -->
<!-- <li>
<a href="<?php echo base_url().'home';?>" class="dropdown-toggle">
<i class="fa fa-wrench"></i>
<span>Configuration</span> 
<i class="fa fa-angle-right drop-icon"></i>
</a>
<ul class="submenu">
<li>
<a href="<?php echo base_url().'home/environment';?>">
Manage Environment
</a>
</li>
 <li>
<a href="browser.html">
Manage Browser
</a>
</li>
<li>
<a href="application.html">
Manage Application
</a>
</li>
<li>
<a href="testcases.html">
Manage Test Cases
</a>
</li>
</ul>
</li>  -->
<!-- <li>
<a href="companyurl.html">
<i class="fa fa-link"></i>
<span>Company URL</span> 
</a>
</li> -->
<!-- <li>
<a href="execution.html">
<i class="fa fa-expand"></i>
<span>Execution</span> 
</a>
</li> -->
<!-- <li>
<a href="reports.html">
<i class="fa fa-table"></i>
<span>Report</span> 
</a>
</li> -->
<li>
<a href="<?php echo base_url().'home/profile';?>">
<i class="fa fa-user"></i>
<span>Profile</span> 
</a>
</li> 
</ul>
</div>
</div>
</section>
<div id="nav-col-submenu"></div>
</div>