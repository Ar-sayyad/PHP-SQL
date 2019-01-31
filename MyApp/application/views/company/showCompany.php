<?php include('header.php');?>


<div id="page-wrapper" class="container">
<div class="row">

<?php include('navigation.php');?>

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<center style="color:red"><?php echo validation_errors(); ?></center>
<a onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/add_company/');"  class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Add Company
</a>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>SR No</th>
<th>Name</th>
<th>Email</th>
<th>Added date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $sr=1; foreach ($company_info as $row) { ?>   
<tr>
<td><?php echo $sr;?></td>
<td><?php echo $row['company_name'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['createdAt'];?></td>
<td><?php if($row['status']==0){?>
  <a href="<?php echo base_url(); ?>index.php/Testapp/actComStatus/<?php echo $row['company_id'];?>/<?php echo $row['status'];?>"><button class="btn btn-warning">Inactive</button></a>
  <?php 
    }else { ?>
	  <a href="<?php echo base_url(); ?>index.php/Testapp/actComStatus/<?php echo $row['company_id'];?>/<?php echo $row['status'];?>"><button class="btn btn-info">Active </button></a>
	<?php     }?></td>

<td>
<a style="cursor:pointer" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/edit_company/<?php echo $row['company_id'];?>');" class="table-link">
<span  class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
</span>
</a>
<a  href="<?php echo base_url(); ?>index.php/Testapp/company/delete/<?php echo $row['company_id'];?>" class="table-link danger">
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
 