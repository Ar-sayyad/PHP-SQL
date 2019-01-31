
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="<?php echo base_url().'Supervisor';?>">home</a></li>

<li class="active"><span>PROFILE</span></li>
</ol>
<h1>User Profile</h1>
</div>
</div>

<div class="row" id="user-profile">
 <div class="col-lg-3 col-md-4 col-sm-4">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2><?php echo $this->session->userdata('supervisor_email'); ?></h2>
</header>
<div class="main-box-body clearfix">
<?php if($this->session->userdata('supervisor_profile')!=""){?>
 <img src="<?php echo base_url();?>assets/uploads/supervisors/<?php echo $profile[0]->profile_pic ?>" alt="" class="profile-img img-responsive center-block"/>
<?php }?>
<div class="profile-details">
<ul class="fa-ul">
<li><i class="fa-li fa fa-phone"></i>: <span><?php echo $profile[0]->supervisor_contact;?></span></li>
<li><i class="fa-li fa fa-envelope"></i>: <span><?php echo $profile[0]->supervisor_email;?></span></li>
<li><i class="fa-li fa fa-map-marker"></i>: <span><?php echo $profile[0]->supervisor_address;?></span></li>
</ul>
</div>
</div>
</div>
</div> 
<?php
	 if($this->session->userdata('message_success'))
		{
		 ?> 
		<div class="col-md-6 col-md-offset-3 text-center alert" id="deletesuccess"> 
			 <div class="alert alert-block alert-success">           
			 <div class="kode-alert kode-alert-icon alert3" >
				 <i class="fa fa-check"></i>
				<?php echo $this->session->userdata('message_success'); ?>
			</div>
			</div>
		</div>
	 <?php
		 }
	?>
	 <?php
		 if($this->session->userdata('message_failed'))
	 {
	 ?>  
			<div class="col-md-6 col-md-offset-3 text-center alert" id="deletesuccess1">  
				<div class="alert alert-block alert-success">          
					<div class="kode-alert btn-danger" >
						<?php echo $this->session->userdata('message_failed'); ?>
					</div>
				 </div> 
			 </div> 
	 <?php
		  }
	 ?>
<div class="col-lg-9 col-md-8 col-sm-8">
<div class="main-box clearfix">
<div class="tabs-wrapper profile-tabs">
<ul class="nav nav-tabs">
<li class="active"><a href="#myprofile" data-toggle="tab">My Profile</a></li>
<li><a href="#tab-newsfeed" data-toggle="tab">Change Password</a></li>
 
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="myprofile">
<div id="newsfeed">
 <form method="post">
 <?php 
 if($profile)
 {
?>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">Name</label>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="supervisor_name" value="<?php echo $profile[0]->supervisor_name;?>" onKeyPress="return ValidateAlpha(event);">
</div>
<div class="form-group">
<label for="exampleTextarea">Email</label><span style="color:red">*</span>
<input type="email" class="form-control" required id="exampleInputPassword1" placeholder="Email" name="supervisor_email" value="<?php echo $profile[0]->supervisor_email;?>" readonly>
</div>
<div class="form-group">
<label for="exampleTextarea">Address</label>
<textarea class="form-control" rows="2" placeholder="Address" name="supervisor_address"><?php echo $profile[0]->supervisor_address;?></textarea>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">Mobile</label><span style="color:red">*</span>
<input type="text" class="form-control" required id="exampleInputPassword1" placeholder="Mobile" name="supervisor_contact" value="<?php echo $profile[0]->supervisor_contact;?>" onkeypress="return isNumberKey(event)" readonly>
</div>
<div class="form-group">
<label for="exampleTextarea">Alternate Mobile</label>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mobile" name="supervisor_alternet_contact" value="<?php echo $profile[0]->supervisor_alternet_contact;?>" onkeypress="return isNumberKey(event)">
</div> 
<!--<div class="form-group">
<label for="exampleTextarea">Profile</label>
<input type="file" class="form-control" id="exampleInputPassword1" name="supervisor_profile" value="<?php echo $profile[0]->profile_pic;?>" >
</div>-->
<div class="form-group"> 
<label for="exampleTextarea">&nbsp;</label><br>
 <input type="submit" id="btn_update" name="btn_update" class="btn btn-primary">
</div>  
</div>
</div>
<?php
}
?> 
</form>
</div>
</div>

<div class="tab-pane fade" id="tab-newsfeed">
<div id="newsfeed">
 <form method="post">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">Old Password</label><span style="color:red">*</span>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Old Password" name="old_password" required="">
</div>
<div class="form-group">
<label for="exampleTextarea">New Password</label><span style="color:red">*</span>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="new_password" required="">
</div>
<div class="form-group">
<label for="exampleTextarea">Confirm Password</label><span style="color:red">*</span>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm_password" required="">
</div> 
<div class="form-group"> 
 <input type="submit" name="change_password" id="change_password" class="btn btn-primary">
</div> 
</div>
<div class="col-md-6">

</div>
</div> 
</form>
</div>
</div>
<!-- <div class="tab-pane fade" id="tab-activity">
  <form role="form">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="exampleTextarea">Host Name</label>
<h5><strong>smtp.gmail.com</strong></h5>
</div>
<div class="form-group">
<label for="exampleTextarea">Port No</label>
<h5><strong>234</strong></h5>
</div>

</div>
<div class="col-md-4">
<div class="form-group">
<label for="exampleTextarea">User Name</label>
<h5><strong>partneritin@gmail.com</strong></h5>
</div> 
<div class="form-group">
<label for="exampleTextarea">Security Protocol</label>
<h5><strong>SMTP</strong></h5>
</div> 
</div>
<div class="col-md-4">
	<a href="#mailsettings" data-toggle="modal" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
</div>
</div> 
</form>
</div> -->

 
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

 <!-- mailsettings modal -->
  <div class="modal fade" id="mailsettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Update Mail Setting</h4>
</div>
<div class="modal-body">
<form role="form">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Host Name</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Host Name">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Port No</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Port No">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Username</label>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
</div> 
</div>
<div class="col-md-6"> 

<div class="form-group">
<label for="exampleTextarea">Password</label>
<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleTextarea">Security Protocol</label>
<select class="form-control">
<option>SMTP</option>
<option>POP3</option>
<option>IMAP</option>
</select>
</div>
 
</div>
</div> 
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div> 
</div> 
</div> 
<!-- end mailsettings modal -->
<script src="<?php echo base_url().'assets/js/validation.js';?>"></script>
<script src="<?php echo base_url().'assets/js/demo-skin-changer.js';?>"></script>  
<script src="<?php echo base_url().'assets/js/jquery.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.nanoscroller.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/demo.js';?>"></script>  
 
<script src="<?php echo base_url().'assets/js/jquery.slimscroll.min.js';?>"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&amp;sensor=false"></script>
<script src="<?php echo base_url().'assets/js/jquery.magnific-popup.min.js';?>"></script>
 
<script src="<?php echo base_url().'assets/js/scripts.js';?>"></script>
<script src="<?php echo base_url().'assets/js/pace.min.js';?>"></script>
<script type="text/javascript">
							 $(document).ready( function() {
      $('#deletesuccess').delay(3000).fadeOut();    
      $('#deletesuccess1').delay(3000).fadeOut();
    });
    </script>
 
<script type="text/javascript">
	    // When the window has finished loading create our google map below
	    google.maps.event.addDomListener(window, 'load', init);
	    
	    function init() {
	    	var latlng = new google.maps.LatLng(40.763986, -73.958674);
	    	
	        //APPLE MAP
	        var mapOptionsApple = {
	            zoom: 12,
	            scrollwheel: false,
	            center: latlng,
	
	            // How you would like to style the map. 
	            // This is where you would paste any style found on Snazzy Maps.
	            styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}]
	        };
	
	        var mapElementApple = document.getElementById('map-apple');
	
	        // Create the Google Map using out element and options defined above
	        var mapApple = new google.maps.Map(mapElementApple, mapOptionsApple);
	        
	        var markerApple = new google.maps.Marker({
	    		position: latlng,
	    		map: mapApple
	    	});
	    }
	    
		$(document).ready(function() {
			$('.conversation-inner').slimScroll({
		        height: '340px'
		    });
		});
		
		$(function() {
			$(document).ready(function() {
				$('#newsfeed .story-images').magnificPopup({
					type: 'image',
					delegate: 'a',
					gallery: {
						enabled: true
				    }
				});
			});
		});
	
	</script>
	
</body>

<!-- Mirrored from cube.adbee.technology/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 18 Nov 2015 07:07:37 GMT -->
</html>