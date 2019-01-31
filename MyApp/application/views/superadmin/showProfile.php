<?php include('header.php');?>

<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>


<div class="row" id="user-profile">
<?php if ($this->session->flashdata('msg')){?>
   <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: green;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid green;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:green"></i>
        </button><?php echo $this->session->flashdata('msg'); ?>
    </div>  
<?php $this->session->set_flashdata('msg', '');}?>
    
    <?php if ($this->session->flashdata('err_msg')){?>
  <div id="mssg" style="margin-bottom:0px;margin-top:5px;color: RED;text-align: center;background-color: #fff; width: 75%;margin-left: 100px;padding: 7px; border: 1px solid red;border-radius: 2px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <i class="fa fa-times-circle fa-fw fa-lg" style="color:RED"></i>
        </button><?php echo$this->session->flashdata('err_msg'); ?>
    </div> 
<?php $this->session->set_flashdata('err_msg', '');}?>
    <br>
<div class="col-lg-3 col-md-4 col-sm-4">
<div class="main-box clearfix">
<header class="main-box-header clearfix">

<?php foreach($myprofile_info as $row){?>
	
<h2><b><?php echo $row['fname'];?> <?php echo $row['lname'];?></b></h2>
</header>
<div class="main-box-body clearfix">
<!--<img src="<?php echo base_url();?>/partnerIT/img/samples/scarlet-159.png" alt="" class="profile-img img-responsive center-block"/>
<a href="#mailsettings" data-toggle="modal" class="table-link">
<span class="fa-stack" style="float:right;margin-top:-60px">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>-->


<div class="profile-details">
<ul class="fa-ul">
<li><i class="fa-li fa fa-phone"></i>: <span><?php echo $row['contact'];?></span></li>
<li><i class="fa-li fa fa-envelope"></i>: <span><?php echo $row['email'];?></span></li>
<li><i class="fa-li fa fa-map-marker"></i>: <span><?php echo $row['address'];?></span></li>
</ul>
</div>

</div>
</div>
</div>
<div class="col-lg-9 col-md-8 col-sm-8">
<div class="main-box clearfix">
<div class="tabs-wrapper profile-tabs">
<ul class="nav nav-tabs">
<li class="active"><a href="#myprofile" data-toggle="tab">My Profile</a></li>
<li><a href="#tab-newsfeed" data-toggle="tab">Change Password</a></li>
<li><a href="#tab-activity" data-toggle="tab">Manage Email Setting</a></li>
<li><a href="#tab-path" data-toggle="tab">Set Folder Location</a></li> 
</ul>
<div class="tab-content">
<div class="tab-pane fade in active" id="myprofile">
<div id="newsfeed">
 <form role="form" action="<?php echo base_url(); ?>index.php/Admin/updateProfile/<?php echo $row['admin_id'];?>" method="post">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">First Name</label> <span style="color:red">*</span>
<input type="text" class="form-control" id="f_name" required  name="fname" value="<?php echo $row['fname'];?>" placeholder="First name">
</div>
    <div class="form-group">
<label for="exampleTextarea">Last Name</label> <span style="color:red">*</span>
<input type="text" class="form-control" id="l_name" required  name="lname" value="<?php echo $row['lname'];?>" placeholder="Last name">
</div>
<div class="form-group">
<label for="exampleTextarea">Email</label> <span style="color:red">*</span>
<input type="email" class="form-control" name="email" required readonly id="email" value="<?php echo $row['email'];?>" placeholder="Email">
</div>

<div class="form-group">
<label for="exampleTextarea">Mobile</label> <span style="color:red">*</span>
<input type="text" class="form-control" name="contact" required id="contact" pattern="[0-9]{10,10}"  autocomplete="off" maxlength="10" value="<?php echo $row['contact'];?>" placeholder="Mobile">
</div>
<div class="form-group">
<label for="exampleTextarea">Address</label>
<textarea class="form-control" rows="2" name="address" placeholder="Address"><?php echo $row['address'];?></textarea>
</div>



<div class="form-group"> 
<label for="exampleTextarea">&nbsp;</label><br>
 <button type="submit" class="btn btn-primary">Update</button>
</div>  
</div>
</div> 
</form>
</div>
</div>
<div class="tab-pane fade" id="tab-newsfeed">
<div id="newsfeed">
 <form role="form" action="<?php echo base_url(); ?>index.php/Admin/updatePassword/<?php echo $row['admin_id'];?>" method="post">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">Old Password</label> <span style="color:red">*</span>
<input type="password" class="form-control" id="old_password" required="" autocomplete="off" name="old_password" placeholder="Old Password">
</div>
<div class="form-group">
<label for="exampleTextarea">New Password</label> <span style="color:red">*</span>
<input type="password" class="form-control" id="password" required="" autocomplete="off" name="password" placeholder="New Password">
</div>
<div class="form-group">
<label for="exampleTextarea">Confirm Password</label> <span style="color:red">*</span>
<input type="password" class="form-control" id="confirm" required="" autocomplete="off" name="confirm" placeholder="Confirm Password">
</div> 
<div class="form-group"> 
 <button type="submit" class="btn btn-primary">Change Password</button>
</div> 
</div>
<div class="col-md-6">

</div>
</div> 
</form>
</div>
</div>

<?php }?>
<div class="tab-pane fade" id="tab-activity">
  <form role="form">
<?php foreach($myprofile_mail_info as $rows){?>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label for="exampleTextarea">Host Name</label>
<h5><strong><?php echo $rows['host_name'];?></strong></h5>
</div>
<div class="form-group">
<label for="exampleTextarea">Port No</label>
<h5><strong><?php echo $rows['port'];?></strong></h5>
</div>

</div>
<div class="col-md-4">
<div class="form-group">
<label for="exampleTextarea">Setting Email</label>
<h5><strong><?php echo $rows['setting_email'];?></strong></h5>
</div> 
<div class="form-group">
<label for="exampleTextarea">Security Protocol</label>
<h5><strong><?php echo $rows['secuirity_protocol'];?></strong></h5>
</div> 
</div>
<?php } ?>
<div class="col-md-4">
<a onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/edit_mailsetting/<?php echo $rows['admin_id'];?>');" class="table-link" style="cursor:pointer">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
</div>
</div> 
</form>
</div>

<div class="tab-pane fade" id="tab-path">
<?php foreach($myprofile_info as $row){ ?>
<form role="form" action="<?php echo base_url(); ?>index.php/Admin/updatePath/<?php echo $row['admin_id'];?>" method="post">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea">Set Folder Path</label> <span style="color:red">*</span>
<input type="text" class="form-control" id="path" required="" value="<?php echo $row['path'];?>" autocomplete="off" name="path" placeholder="Set Folder Path">
</div>
<div class="form-group">
<label for="exampleTextarea">Set Test Data Path</label> <span style="color:red">*</span>
<input type="text" class="form-control" id="testdata_path" required="" value="<?php echo $row['testdata_path'];?>" autocomplete="off" name="testdata_path" placeholder="Set Folder Path">
</div>
<?php } ?>
<div class="form-group"> 

 <button type="submit" class="btn btn-primary">Update</button>
</div> 
</div>
<div class="col-md-6">

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
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
&copy;AutoIT
</p>
</footer>
</div>
</div>
</div>
</div>

 
<!-- end mailsettings modal -->


<script src="<?php echo base_url();?>/partnerIT/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url();?>/partnerIT/js/jquery.js"></script>
<script src="<?php echo base_url();?>/partnerIT/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>/partnerIT/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>/partnerIT/js/demo.js"></script>  
 
<script src="<?php echo base_url();?>/partnerIT/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&amp;sensor=false"></script>
<script src="<?php echo base_url();?>/partnerIT/js/jquery.magnific-popup.min.js"></script>
 
<script src="<?php echo base_url();?>/partnerIT/js/scripts.js"></script>
<script src="<?php echo base_url();?>/partnerIT/js/pace.min.js"></script>
 
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

</html>