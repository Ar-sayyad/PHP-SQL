<!DOCTYPE html>
<html>

<!-- Mirrored from cube.adbee.technology/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:05:43 GMT -->
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Dashboard</title>
 
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
 
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 
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
<a href="index.html" id="logo" class="navbar-brand">
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
<img src="<?php echo base_url().'assets/img/samples/scarlet-159.png';?>" alt=""/>
<span class="hidden-xs">Scarlett Johansson</span> <b class="caret"></b>
</a>
<ul class="dropdown-menu dropdown-menu-right">
<li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</li>
<li class="hidden-xxs">
<a class="btn">
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
<div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
<img alt="" src="img/samples/scarlet-159.png"/>
<div class="user-box">
<span class="name">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Scarlett J.
<i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu">
<li><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li> 
<li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="nav-header nav-header-first hidden-sm hidden-xs">
Navigation
</li>
<li class="active">
<a href="index.html">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span> 
</a>
</li>
<li>
<a href="user.html">
<i class="fa fa-users"></i>
<span>Users</span> 
</a>
</li>
<li>
<a href="index.html" class="dropdown-toggle">
<i class="fa fa-wrench"></i>
<span>Configuration</span> 
<i class="fa fa-angle-right drop-icon"></i>
</a>
<ul class="submenu">
<li>
<a href="environment.html">
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
</li>
<li>
<a href="companyurl.html">
<i class="fa fa-link"></i>
<span>Company URL</span> 
</a>
</li>
<li>
<a href="execution.html">
<i class="fa fa-expand"></i>
<span>Execution</span> 
</a>
</li>
<li>
<a href="reports.html">
<i class="fa fa-table"></i>
<span>Report</span> 
</a>
</li>
<li>
<a href="profile.html">
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
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<div id="content-header" class="clearfix">
<div class="pull-left">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><span>Dashboard</span></li>
</ol>
<h1>Dashboard</h1>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored emerald-bg">
<i class="fa fa-cogs"></i>
<span class="headline">Manage Environment</span>
<span class="value">4.658</span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored green-bg">
<i class="fa fa-globe"></i>
<span class="headline">Manage Browser</span>
<span class="value">22.631</span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored red-bg">
<i class="fa fa-th-list"></i>
<span class="headline">Manage Application</span>
<span class="value">92.421</span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored purple-bg">
<i class="fa fa-search"></i>
<span class="headline">Manage Test Cases</span>
<span class="value">13.298</span>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left">Companies Details</h2>
</header>
<div class="main-box-body clearfix">
<div class="row">
<div class="col-md-6">
 <div id="highchartdiv"></div>
</div>
<div class="col-md-6">
 <div class="table-responsive clearfix">
<table class="table table-bordered tbl1">
<thead>
<tr>
<th>Company</th>
<th>Application</th>
<th>No of Test Cases</th> 
</tr>
</thead>
<tbody> 
<tr>
<td rowspan="3">
<a href="#">SVMPIT</a>
</td>
<td>
<a href="#">Smart IT</a>
</td>
<td>
45343
</td> 
</tr>
 <tr>
<td>
<a href="#">MyIT</a>
</td>
<td>
2143
</td> 
</tr>
<tr>
<td>
<a href="#">RemedyITSM</a>
</td>
<td>
3545
</td> 
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="main-box">
<div class="main-box-body clearfix">
<div class="row">

<div class="col-md-6">
<div class="table-responsive clearfix">
<table class="table table-bordered tbl1">
<thead>
<tr>
<th>Company</th>
<th>Application</th>
<th>No of Test Cases</th> 
</tr>
</thead>
<tbody> 
<tr>
<td rowspan="3">
<a href="#">BMC</a>
</td>
<td>
<a href="#">Smart IT</a>
</td>
<td>
45343
</td> 
</tr>
 <tr>
<td>
<a href="#">MyIT</a>
</td>
<td>
2143
</td> 
</tr>
<tr>
<td>
<a href="#">RemedyITSM</a>
</td>
<td>
3545
</td> 
</tr>
</tbody>
</table>
</div>
</div> 
<div class="col-md-6">
 <div id="highchartdiv1"></div>
</div>
</div>
</div>
</div>
</div>
</div>




</div>
</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
Powered by Cube Theme.
</p>
</footer>
</div>
</div>
</div>
</div>
 
 
<script src="<?php echo base_url().'assets/js/demo-skin-changer.js';?>"></script>  
<script src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.nanoscroller.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js';?>"></script>  
 
<script src="<?php echo base_url().'assets/js/moment.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery-jvectormap-1.2.2.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery-jvectormap-world-merc-en.js';?>"></script>
<script src="<?php echo base_url().'assets/js/gdp-data.js';?>"></script>
<script src="<?php echo base_url().'assets/js/flot/jquery.flot.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/flot/jquery.flot.resize.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/flot/jquery.flot.time.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/flot/jquery.flot.threshold.js';?>"></script>
<script src="<?php echo base_url().'assets/js/flot/jquery.flot.axislabels.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.sparkline.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/skycons.js';?>"></script>
 
<script src="<?php echo base_url().'assets/js/scripts.js';?>"></script>
<script src="<?php echo base_url().'assets/js/pace.min.js';?>"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
	$(document).ready(function() {
		
Highcharts.chart('highchartdiv', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 50,
            beta: 0
        }
    },
    title: {
        text: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [
            ['Smart IT', 45],
            {
                name: 'RemedyITSM',
                y: 30,
                sliced: true,
                selected: true
            },
            ['MyIT', 35]
             
        ]
    }]
});


Highcharts.chart('highchartdiv1', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 50,
            beta: 0
        }
    },
    title: {
        text: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
             credits: {
      enabled: false
  },
    series: [{
        type: 'pie',
        name: 'Percentage',
        data: [
            ['MyIT', 45],
            {
                name: 'RemedyITSM',
                y: 30,
                sliced: true,
                selected: true
            },
            ['Smart IT', 45]
             
        ]
    }]
});



















	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		 
	    
		//WORLD MAP
		$('#world-map').vectorMap({
			map: 'world_merc_en',
			backgroundColor: '#ffffff',
			zoomOnScroll: false,
			regionStyle: {
				initial: {
					fill: '#e1e1e1',
					stroke: 'none',
					"stroke-width": 0,
					"stroke-opacity": 1
				},
				hover: {
					"fill-opacity": 0.8
				},
				selected: {
					fill: '#8dc859'
				},
				selectedHover: {
				}
			},
			markerStyle: {
				initial: {
					fill: '#e84e40',
					stroke: '#e84e40'
				}
			},
			markers: [
				{latLng: [38.35, -121.92], name: 'Los Angeles - 23'},
				{latLng: [39.36, -73.12], name: 'New York - 84'},
				{latLng: [50.49, -0.23], name: 'London - 43'},
				{latLng: [36.29, 138.54], name: 'Tokyo - 33'},
				{latLng: [37.02, 114.13], name: 'Beijing - 91'},
				{latLng: [-32.59, 150.21], name: 'Sydney - 22'},
			],
			series: {
				regions: [{
					values: gdpData,
					scale: ['#6fc4fe', '#2980b9'],
					normalizeFunction: 'polynomial'
				}]
			},
			onRegionLabelShow: function(e, el, code){
				el.html(el.html()+' ('+gdpData[code]+')');
			}
		});

		/* SPARKLINE - graph in header */
		var orderValues = [10,8,5,7,4,4,3,8,0,7,10,6,5,4,3,6,8,9];

		$('.spark-orders').sparkline(orderValues, {
			type: 'bar', 
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		var revenuesValues = [8,3,2,6,4,9,1,10,8,2,5,8,6,9,3,4,2,3,7];

		$('.spark-revenues').sparkline(revenuesValues, {
			type: 'bar', 
			barColor: '#ced9e2',
			height: 25,
			barWidth: 6
		});

		/* ANIMATED WEATHER */
		var skycons = new Skycons({"color": "#03a9f4"});
		// on Android, a nasty hack is needed: {"resizeClear": true}

		// you can add a canvas by it's ID...
		skycons.add("current-weather", Skycons.SNOW);

		// start animation!
		skycons.play();

	});
	</script>
</body>

<!-- Mirrored from cube.adbee.technology/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:06:32 GMT -->
</html>