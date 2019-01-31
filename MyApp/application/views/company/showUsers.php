<?php include('header.php');?>


<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
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
    
<a onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/add_user/');"  class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Add User
</a>
<!--<button id="notification-trigger-slide-on-top" onClick="autoRefresh()" class="btn btn-primary progress-button mrg-b-lg">
<span class="content">Slide On Top</span>
</button>-->
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Added date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $sr=1; foreach ($user_info as $row) { ?>   
<tr>
<td><?php echo $sr;?></td>
<td><?php echo ucfirst($row['fname']." ".$row['lname']);?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $this->test_model->get_user_role($row['user_type']);?></td>
<td><?php echo $row['createdAt'];?></td>
<td>
<a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/edit_user/<?php echo $row['user_id'];?>');" class="table-link">
<span  class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a  href="<?php echo base_url(); ?>index.php/testapp/users/delete/<?php echo $row['user_id'];?>" class="table-link danger">
<span class="fa-stack" onclick="return checkDelete();">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<?php $sr++; }?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
 
</div>
</div>




<!----footer-min start********-->

<?php include('footer-min.php');?>
<!-- <script src="<?php echo base_url();?>partnerIT/js/demo-skin-changer.js"></script>  
<script src="<?php echo base_url();?>partnerIT/js/jquery.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/demo.js"></script>  
 
<script src="<?php echo base_url();?>partnerIT/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/snap.svg-min.js"></script>  
<script src="<?php echo base_url();?>partnerIT/js/classie.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/notificationFx.js"></script>
 
<script src="<?php echo base_url();?>partnerIT/js/scripts.js"></script>
<script src="<?php echo base_url();?>partnerIT/js/pace.min.js"></script>
 
<script type="text/javascript">
$(document).ready(function() {
	<?php if($errors){?>
		//autoRefresh();
		 var foo = "<?php echo "$errors"; ?>";
	alert(foo);
	

	function autoRefresh() {
				var notification = new NotificationFx({
					message : 'Hello',
					layout : 'bar',
					effect : 'slidetop',
					type : 'error', 
					onClose : function() {
						//bttnSlideOnTop.disabled = false;
					}
				});
				notification.show();
			
			}
			
			<?php }?>
	
		});		
	</script>-->
</body>

</html>