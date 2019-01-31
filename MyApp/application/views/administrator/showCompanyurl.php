<?php include('header.php');?>

<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<div class="main-box-body clearfix">
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
     
<h2 class="pull-left">&nbsp;</h2>
<div class="col-md-12 text-right">

<a onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/add_companyurl/');" class="btn btn-primary">
<i class="fa fa-plus-circle fa-lg"></i> Add Company URL
</a>

</div>
</header>
<div class="table-responsive">
<table class="table">
	<thead>
		<tr>
			
			<th>Application</th>			
			<th>View URL</th>
			<th>Edit URL</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php $sr=1; foreach ($companyurl_info as $row) { ?>   
<tr>

<td><h6><?php echo $appname= $this->administrator_model->get_test_application($row['application_id']);?></h6></td>

<td>
<a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/viewCompanyUrl/<?php echo $row['company_env_id'];?>/<?php echo $row['company_environ_url_id'];?>');" class="table-link">
<button  class="btn btn-primary"><i class="fa fa-eye"></i> View URL
</button>
</a>
</td>
<td>
<a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/edit_companyurl/<?php echo $row['company_env_id'];?>/<?php echo $row['company_environ_url_id'];?>');" class="table-link">
<button  class="btn btn-warning"><i class="fa fa-pencil"></i> Edit URL
</button>
</a>
</td>
<td>
<a  href="<?php echo base_url(); ?>index.php/Administrator/companyUrl/delete/<?php echo $row['company_env_id'];?>" class="table-link danger">
<button  class="btn btn-danger" onclick="return checkDelete();"><i class="fa fa-trash-o"></i> Delete
</button>
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